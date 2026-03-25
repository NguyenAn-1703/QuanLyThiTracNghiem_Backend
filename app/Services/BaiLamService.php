<?php

namespace App\Services;

use App\Jobs\SubmitTestJob;
use App\Models\BaiLam;
use App\Models\CauHoi;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BaiLamService
{
    private LogBaiLamService $logBaiLamService;
    private ChiTietBaiLamService $chiTietBaiLamService;
    private DeThiService $deThiService;
    private CauHoiService $cauHoiService;
    private ChiTietDeThiService $chiTietDeThiService;

    public function __construct(LogBaiLamService $logBaiLamService, ChiTietBaiLamService $chiTietBaiLamService, DeThiService $deThiService, CauHoiService $cauHoiService, ChiTietDeThiService $chiTietDeThiService)
    {
        $this->logBaiLamService = $logBaiLamService;
        $this->chiTietBaiLamService = $chiTietBaiLamService;
        $this->deThiService = $deThiService;
        $this->cauHoiService = $cauHoiService;
        $this->chiTietDeThiService = $chiTietDeThiService;
    }

    public function getAll()
    {
        return BaiLam::all();
    }

    public function getOne(BaiLam $baiLam)
    {
        return $baiLam;
    }

    public function add(array $data)
    {
        return BaiLam::create($data);
    }

    public function update(array $data, BaiLam $baiLam)
    {
        $baiLam->update($data);
        return $baiLam;
    }

    public function updateById(array $data, int $baiLamId)
    {
        $baiLam = BaiLam::findOrFail($baiLamId);
        return $baiLam->update($data);
    }

    public function delete(BaiLam $baiLam)
    {
        return $baiLam->delete();
    }

    public function startTest(array $data)
    {
        $thiSinhId = $data["thiSinhId"];
        $deThiId = $data["deThiId"];

        $deThi = $this->deThiService->getById($deThiId);

        //tạo BaiLam
        $baiLam = [
            "thiSinhId" => $thiSinhId,
            "deThiId" => $deThiId,
            "thoiGianBatDau" => Date::now(),
        ];

        $baiLam = BaiLam::create($baiLam);

        //tạo LogBaiLam
        $logBaiLam = [
            "baiLamId" => $baiLam->id,
            "soLanChuyenTab" => 0,
        ];
        $logBaiLam = $this->logBaiLamService->add($logBaiLam);

        //tạo ChiTietBaiLam
        $chiTietBaiLam = [];

        $cauHois = $this->deThiService->getQuestions($deThiId);

        $chiTietBaiLam = $cauHois->map(function ($item) use ($baiLam) {
            return [
                "baiLamId" => $baiLam->id,
                "cauHoiId" => $item->id
            ];
        });

        $startTime = Date::now();
        $doTestTime = $deThi->thoiGianLamBai;
        $endTime = $deThi->thoiGianKetThuc;

        $duration = $this->CalculateDuration($startTime, $endTime, $doTestTime) * 60;


        Log::info("thời gian $duration");
        Log::info("start time $startTime");
        Log::info("end time $endTime");

        $this->setAutoSubmit($baiLam->id, $duration);

        return DB::transaction(function () use ($chiTietBaiLam) {
            $this->chiTietBaiLamService->addManyNonTrans($chiTietBaiLam);
        });
    }

    public function CalculateDuration(DateTime $startTime, DateTime $endTime, int $doTestTime)
    {
        $expectedEnd = clone $startTime;
        $expectedEnd->modify("+{$doTestTime} minutes");

        if ($expectedEnd <= $endTime) {
            return $doTestTime;
        }

        return ($endTime->getTimestamp() - $startTime->getTimestamp()) / 60;
    }

    //trường hợp front-end mất mạng không gửi request submit => backend tự động submit, chặn submit lại
    public function setAutoSubmit(int $baiLamId, int $sec)
    {
        $sec += 10; // đợi 10s nếu frontend không gửi thì submit tự động
        SubmitTestJob::dispatch($baiLamId)->delay(now()->addSecond($sec));
    }

    public function updatestudenttest(array $data, BaiLam $baiLam)
    {
        $answers = $data['answers'];

        $chiTietBaiLams = collect($answers)->map(function ($item) use ($baiLam) {
            $cauHoiId = $item['cauHoiId'];
            $cauHoi = $this->cauHoiService->getById($cauHoiId);
            return $this->getAnswer($item, $baiLam, $cauHoi);
        });

        DB::transaction(function () use ($chiTietBaiLams) {
            $this->chiTietBaiLamService->updateBatch($chiTietBaiLams->toArray());
        });
    }

    public function getAnswer(array $data, BaiLam $bailam, CauHoi $cauhoi)
    {
        $dapAnId = $data['dapAnId'];

        //kiểm tra câu trả lời thuộc câu hỏi, câu trả lời là đúng
        $cauTraLois = $this->cauHoiService->getCauTraLois($cauhoi->id);

        $isCorrectChooser = $cauTraLois->contains(function ($item) use ($dapAnId) {
            return ($dapAnId == $item->id && $item->isCorrectAnswer);
        });

        $diem = 0;
        if ($isCorrectChooser) {
            $chiTietDeThi = $this->chiTietDeThiService->getChiTietDeThiById($bailam->deThiId, $cauhoi->id);
            $diem = $chiTietDeThi->diem;
        }

        $chiTietBaiLam = [
            "baiLamId" => $bailam->id,
            "cauHoiId" => $cauhoi->id,
            "dapAnId" => $dapAnId,
            "isCorrectChooser" => $isCorrectChooser,
            "diem" => $diem,
        ];

        return $chiTietBaiLam;
    }

    public function submittest(array $data, int $baiLamId)
    {
        $baiLam = BaiLam::findOrFail($baiLamId);
        //Nếu đã submit thì không cho submit nữa
        if ($baiLam->status == "DA_NOP") {
            throw new HttpException(500, "Bài làm đã nộp!");
        }

        $this->updatestudenttest($data, $baiLam); // update lần cuối
        // tính điểm
        $baiLam->load('chiTietBaiLams');
        $soCauDung = $baiLam->chiTietBaiLams->reduce(function ($carry, $item) {
            if ($item->isCorrectChooser) {
                return $carry + 1;
            }
            return $carry;
        }, 0);
        $tongDiem = $baiLam->chiTietBaiLams->reduce(function ($carry, $item) {
            return $carry + $item->diem ?? 0;
        }, 0);

        // cập nhật status
        $dataUpdate = [
            "thoiGianNopBai" => Date::now(),
            "tongDiem" => $tongDiem,
            "soCauDung" => $soCauDung,
            "status" => "DA_NOP"
        ];

        return $this->updateById($dataUpdate, $baiLam->id);
    }

    public function reviewresult(BaiLam $bailam)
    {
        //check cấu hình
        $deThi = $bailam->deThi;
        $deThi->loadCount([
            'cauHois as soCauHoi'
        ]);

        $cauHinhThi = $deThi->cauHinhThi;
        $cauHois = $deThi->cauHois;

        $cauHois->load('cauTraLois');

        $chiTietBaiLams = $bailam->chiTietBaiLams;

        $bailam->makeHidden('deThi');
        $bailam->makeHidden('chiTietBaiLams');
        $deThi->makeHidden('cauHinhThi');

        $mapChiTiet = $chiTietBaiLams->keyBy('cauHoiId'); // giống dictionary

        $cauHois->transform(function ($cauHoi) use ($mapChiTiet) { // map
            $chiTiet = $mapChiTiet->get($cauHoi->id);

            $cauHoi->dapAnDaChon = $chiTiet->dapAnId;

            return $cauHoi;
        });


        if ($cauHinhThi->showScore) {
            $data = [
                "baiLam" => $bailam,
                "deThi" => $deThi,
            ];
            if ($cauHinhThi->showDetailResults) {
                $data["cauHois"] = $cauHois;
            }
        }

        return $data;
    }
}
