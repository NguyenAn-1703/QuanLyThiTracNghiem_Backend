<?php

namespace App\Services;

use App\Models\ChiTietThongBao;
use App\Models\ThongBao;
use Illuminate\Support\Facades\DB;

class ThongBaoService
{
    public function getAll()
    {
        return ThongBao::all()->load(["nguoiGui", "nhomHocPhans.monHoc"]);
    }

    public function getOne(ThongBao $thongBao)
    {
        return $thongBao;
    }

    public function add(array $data)
    {
        return DB::transaction(function () use ($data) {
            $thongBao = ThongBao::create($data);

            $nhomHocPhanIds = $data["nhomHocPhanIds"];
            $chiTietThongBaos = collect($nhomHocPhanIds)->map(
                function ($nhomHocPhanId) use ($thongBao) {
                    return ([
                        "nhomHocPhanId" => $nhomHocPhanId,
                        "thongBaoId" => $thongBao->id,
                    ]);
                }
            )->toArray();

            $chiTietThongBao = ChiTietThongBao::insert($chiTietThongBaos);

            return ([
                "thongBao" => $thongBao,
                "chiTietThongBao" => $chiTietThongBaos
            ]);
        });
    }

    public function update(array $data, ThongBao $thongBao)
    {
        return DB::transaction(function () use ($data, $thongBao) {

            // 1. Update thông báo
            $thongBao->update($data);

            // 2. Xóa toàn bộ chi tiết thông báo cũ
            $thongBao->chiTietThongBaos()->delete();

            // 3. Thêm mới chi tiết thông báo
            if (!empty($data['nhomHocPhanIds'])) {
                $chiTietData = array_map(function ($nhomHocPhanId) use ($thongBao) {
                    return [
                        'thongBaoId' => $thongBao->id,
                        'nhomHocPhanId' => $nhomHocPhanId,
                    ];
                }, $data['nhomHocPhanIds']);

                $thongBao->chiTietThongBaos()->insert($chiTietData);
            }

            return $thongBao->load('chiTietThongBaos');
        });
    }

    public function delete(ThongBao $thongBao)
    {
        $thongBao->chiTietThongBaos()->delete();
        return $thongBao->delete();
    }
}
