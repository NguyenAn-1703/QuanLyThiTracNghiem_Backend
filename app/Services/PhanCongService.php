<?php

namespace App\Services;

use App\Models\PhanCong;
use App\Models\User;

class PhanCongService
{
    public function getAll()
    {
        return PhanCong::all()->load(['monHoc', 'giangVien']);
    }

    // public function getOne(PhanCong $phanCong)
    // {
    //     return $phanCong;
    // }

    public function add(array $data)
    {
        return PhanCong::create($data)->load(['monHoc', 'giangVien']);
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

    public function get_o_gvien(User $user){
        $user->load(['monHocs']);
        return $user->monHocs;
    }
}
