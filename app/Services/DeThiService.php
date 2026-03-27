<?php

namespace App\Services;

use App\Models\DeThi;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DeThiService
{
    protected GiaoBaiThiService $giaoBaiThiService;
    protected ChiTietDeThiService $chiTietDeThiService;
    protected CauHinhThiService $cauHinhThiService;

    public function __construct(GiaoBaiThiService $giaoBaiThiService, ChiTietDeThiService $chiTietDeThiService, CauHinhThiService $cauHinhThiService) {
        $this->giaoBaiThiService = $giaoBaiThiService;
        $this->chiTietDeThiService = $chiTietDeThiService;
        $this->cauHinhThiService = $cauHinhThiService;
    }
    public function getAll()
    {
        return DeThi::all()->load(['monThi', 'nhomHocPhans']);
    }

    public function getOne(DeThi $deThi)
    {
        $deThi->load('cauHois');
        $deThi->cauHois->load('cauTraLois');
        return $deThi;
    }

    public function getById(int $id)
    {
        return DeThi::findOrFail($id);
    }

    public function add(array $data)
    {
        return DB::transaction(function () use ($data) {
            $deThiData = [
                "tenDe" => $data["tenDe"],
                "thoiGianBatDau" => $data["thoiGianBatDau"],
                "thoiGianKetThuc" => $data["thoiGianKetThuc"],
                "thoiGianLamBai" => $data["thoiGianLamBai"],
                "nguoiTaoId" => $data["nguoiTaoId"],
                "monThiId" => $data["monThiId"],
            ];

            $deThi = DeThi::create($deThiData);

            $nhomHocPhanIds = $data["nhomHocPhanIds"];
            $cauHois = $data["cauHois"];

            $giaoBaiThis = collect($nhomHocPhanIds)->map(function ($item) use ($deThi) {
                return (
                    [
                        "deThiId" => $deThi->id,
                        "nhomHocPhanId" => $item,
                        "thoiGianBatDau" => $deThi["thoiGianBatDau"],
                        "thoiGianKetThuc" => $deThi["thoiGianKetThuc"],
                    ]
                );
            });

            $chiTietDeThis = collect($cauHois)->map(function ($item) use($deThi){
                return([
                    "deThiId" => $deThi->id,
                    "cauHoiId" => $item["id"],
                    "thuTu" => $item["thuTu"],
                    "diem" => $item["diem"]
                ]) ;
            });

            $this->giaoBaiThiService->addArr($giaoBaiThis->toArray());
            $this->chiTietDeThiService->addArr($chiTietDeThis->toArray());

            $cauHinh = $data["cauHinh"];
            $cauHinh["deThiId"] = $deThi->id;
            // $cauHinh = [
            //     "deThiId" => $deThi->id,
            //     "hasMonitoring" => $data["cauHinh.hasMonitoring"],
            //     "allowCopy" => $data["allowCopy"],
            //     "allowPrint" => $data["allowPrint"],
            //     "isEnableResume" => $data["isEnableResume"],
            //     "shuffleQuestions" => $data["shuffleQuestions"],
            //     "shuffleAnswers" => $data["shuffleAnswers"],
            //     "showScore" => $data["showScore"],
            //     "showDetailResults" => $data["showDetailResults"],
            //     "isLimitSwitchTab" => $data["isLimitSwitchTab"],
            //     "tabSwitchLimit" => $data["tabSwitchLimit"],
            //     "messageOnWarning" => $data["messageOnWarning"],
            // ];
            
            $this->cauHinhThiService->create($cauHinh);

            $deThi->load(['cauHois', 'monThi', 'nhomHocPhans', 'cauHinhThi']);
            $deThi->cauHois->load('cauTraLois');

            return $deThi;
        });
    }

    public function update(array $data, DeThi $deThi)
    {
        $deThi->update($data);
        return $deThi;
    }

    public function delete(DeThi $deThi)
    {
        return $deThi->delete();
    }

    public function get_osvien(User $user)
    { // lấy tất cả đề thi của sinh viên
        $user->load('nhomHocPhans.deThis');

        //map và tách các phần tử trong mảng con (dethis) ra 1 mảng
        $deThi = $user->nhomHocPhans->flatMap(
            function ($nhomHocPhan) {
                return $nhomHocPhan->deThis->load('monThi');
            }
        )->unique('id'); // tránh trường hợp đề thi chia cho 2 nhóm khác nhau
        $deThi;

        return $deThi;
    }

    public function getQuestions(int $deThiId)
    {
        $deThi = DeThi::findOrFail($deThiId);
        $deThi->load('cauHois');
        return $deThi->cauHois;
    }

    public function getAd(DeThi $deThi)
    {
        $deThi->load(['cauHois', 'monThi', 'nhomHocPhans', 'cauHinhThi']);
        $deThi->cauHois->load('cauTraLois');
        return $deThi;
    }
}
