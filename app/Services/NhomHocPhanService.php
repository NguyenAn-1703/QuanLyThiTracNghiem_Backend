<?php

namespace App\Services;

use App\Models\NhomHocPhan;

class NhomHocPhanService
{
    public function getAll()
    {
        return NhomHocPhan::all();
    }

    public function getOne(NhomHocPhan $nhomHocPhan)
    {
        return $nhomHocPhan;
    }

    public function add(array $data)
    {
        return NhomHocPhan::create($data);
    }

    public function update(array $data, NhomHocPhan $nhomHocPhan)
    {
        $nhomHocPhan->update($data);
        return $nhomHocPhan;
    }

    public function delete(NhomHocPhan $nhomHocPhan)
    {
        return $nhomHocPhan->delete();
    }

    public function get_w_gvien_mon(NhomHocPhan $nhomHocPhan){
        $nhomHocPhan->load(['giangVien', 'monHoc']);
        return $nhomHocPhan;
    }

    public function get_w_dekiemtra(NhomHocPhan $nhomHocPhan){
        $nhomHocPhan->load(['deThis']);
        return $nhomHocPhan;
    }
}