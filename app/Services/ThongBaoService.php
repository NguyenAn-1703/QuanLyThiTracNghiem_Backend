<?php

namespace App\Services;

use App\Models\ChiTietThongBao;
use App\Models\ThongBao;
use Illuminate\Support\Facades\DB;

class ThongBaoService
{
    public function getAll()
    {
        return ThongBao::all()->load("nguoiGui");
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
                "chiTietThongBao" =>$chiTietThongBaos 
            ]);
        });
    }

    public function update(array $data, ThongBao $thongBao)
    {
        $thongBao->update($data);
        return $thongBao;
    }

    public function delete(ThongBao $thongBao)
    {
        return $thongBao->delete();
    }
}
