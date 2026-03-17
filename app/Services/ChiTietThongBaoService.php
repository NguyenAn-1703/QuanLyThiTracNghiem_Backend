<?php

namespace App\Services;

use App\Models\ChiTietThongBao;

class ChiTietThongBaoService
{
    public function getAll()
    {
        return ChiTietThongBao::all();
    }

    public function getOne(ChiTietThongBao $chiTietThongBao)
    {
        return $chiTietThongBao;
    }

    public function add(array $data)
    {
        return ChiTietThongBao::create($data);
    }

    public function update(array $data, ChiTietThongBao $chiTietThongBao)
    {
        $chiTietThongBao->update($data);
        return $chiTietThongBao;
    }

    public function delete(ChiTietThongBao $chiTietThongBao)
    {
        return $chiTietThongBao->delete();
    }
}