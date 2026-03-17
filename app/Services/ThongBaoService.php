<?php

namespace App\Services;

use App\Models\ThongBao;

class ThongBaoService
{
    public function getAll()
    {
        return ThongBao::all();
    }

    public function getOne(ThongBao $thongBao)
    {
        return $thongBao;
    }

    public function add(array $data)
    {
        return ThongBao::create($data);
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