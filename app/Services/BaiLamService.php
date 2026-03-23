<?php

namespace App\Services;

use App\Models\BaiLam;
use App\Models\CauHoi;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;


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

    public function delete(BaiLam $baiLam)
    {
        return $baiLam->delete();
    }

    public function startTest(array $data)
    {
        return DB::transaction(function () use ($data) {
            $thiSinhId = $data["thiSinhId"];
            $deThiId = $data["deThiId"];
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

            $this->chiTietBaiLamService->addManyNonTrans($chiTietBaiLam);
        });
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

        $chiTietDeThi = $this->chiTietDeThiService->getChiTietDeThiById($bailam->deThiId, $cauhoi->id);
        $diem = $chiTietDeThi->diem;

        $chiTietBaiLam = [
            "baiLamId" => $bailam->id,
            "cauHoiId" => $cauhoi->id,
            "dapAnId" => $dapAnId,
            "isCorrectChooser" => $isCorrectChooser,
            "diem" => $diem,
        ];

        return $chiTietBaiLam;
    }
}
