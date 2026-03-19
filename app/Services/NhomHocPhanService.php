<?php

namespace App\Services;

use App\Models\ChiTietNhom;
use App\Models\NhomHocPhan;
use App\Models\User;

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

    public function get_w_gvien_mon(NhomHocPhan $nhomHocPhan)
    {
        $nhomHocPhan->load(['giangVien', 'monHoc']);
        return $nhomHocPhan;
    }

    public function get_w_dekiemtra(NhomHocPhan $nhomHocPhan)
    {
        $nhomHocPhan->load(['deThis']);
        return $nhomHocPhan;
    }

    public function join_group(array $data)
    {
        $mamoi = $data["maMoi"];
        $sinhVienId = $data["sinhVienId"];
        $nhomHocPhanId = $data["nhomHocPhanId"];

        $nhomHocPhan = NhomHocPhan::findOrFail($nhomHocPhanId);

        if ($mamoi !== $nhomHocPhan->maMoi) {
            throw new \Exception('Mã tham gia không đúng');
        }

        $chiTietNhom = [
            "sinhVienId" => $sinhVienId,
            "nhomHocPhanId" => $nhomHocPhanId
        ];

        return ChiTietNhom::create($chiTietNhom);
    }

    public function get_o_svien(User $user)
    {
        $user->load([
            'nhomHocPhans.giangVien',
            'nhomHocPhans.monHoc'
        ]);
        return $user;
    }
}
