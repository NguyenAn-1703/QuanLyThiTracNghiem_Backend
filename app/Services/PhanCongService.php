<?php

namespace App\Services;

use App\Models\PhanCong;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    public function get_o_gvien(User $user)
    {
        $user->load(['monHocs']);
        return $user->monHocs;
    }

    public function addPhanCong(array $data)
    {
        return DB::transaction(function () use ($data) {
            $giangVienId = $data["giangVienId"];
            $monHocIds = $data["monHocIds"];
            $data = [];
            //Xóa hết phân công cũ của giảng viên
            PhanCong::where('giangVienId', $giangVienId)->delete();
            
            foreach ($monHocIds as $monHocId) {
                $data[] = [
                    'giangVienId' => $giangVienId,
                    'monHocId' => $monHocId,
                ];
            }

            PhanCong::insert($data);
            return $data;
        });
    }
}
