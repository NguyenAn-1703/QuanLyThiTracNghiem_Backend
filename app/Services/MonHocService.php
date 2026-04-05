<?php

namespace App\Services;

use App\Models\MonHoc;
use App\Models\User;

class MonHocService
{
    public function getAll()
    {
        return MonHoc::all();
    }

    public function getOne(MonHoc $monHoc)
    {
        return $monHoc;
    }

    public function add(array $data)
    {
        return MonHoc::create($data);
    }

    public function update(array $data, MonHoc $monHoc)
    {
        $monHoc->update($data);
        return $monHoc;
    }

    public function delete(MonHoc $monHoc)
    {
        return $monHoc->delete();
    }

    public function get_w_nhp()
    {
        $monHocs = MonHoc::all();
        $monHocs->load('nhomHocPhans');
        return $monHocs;
    }

    public function get_w_chuong()
    {
        $monHoc = MonHoc::all();
        $monHoc->load('chuongs');
        return $monHoc;
    }

    public function get_o_gvien(User $user)
    {
        // Lấy id các nhóm học phần giảng viên quản lý
        $nhomIds = $user->quanLyNhomHocPhans->pluck('id');

        $data = $user->monHocs()->with([
            'nhomHocPhans' => function ($query) use ($nhomIds) {
                $query->whereIn('id', $nhomIds);
            }
        ])->get();

        return $data;
    }
}
