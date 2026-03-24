<?php

namespace App\Services;

use App\Models\PhanCong;

class PhanCongService
{
    public function getAll()
    {
        return PhanCong::all();
    }

    public function getOne(PhanCong $phanCong)
    {
        return $phanCong;
    }

    public function add(array $data)
    {
        return PhanCong::create($data);
    }

    // public function update(array $data, PhanCong $phanCong)
    // {
    //     $phanCong->update($data);
    //     return $phanCong;
    // }

    public function delete(int $giangVienId, int $monHocId)
    {
        return PhanCong::where('giangVienId', $giangVienId)
            ->where('monHocId', $monHocId)
            ->delete();
    }
}
