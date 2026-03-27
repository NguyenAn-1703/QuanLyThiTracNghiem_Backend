<?php

namespace App\Services;

use App\Models\DeThi;
use App\Models\User;

class DeThiService
{
    public function getAll()
    {
        return DeThi::all()->load(['monThi', 'nhomHocPhans']);
    }

    public function getOne(DeThi $deThi)
    {
        $deThi->load('cauHois');
        $deThi->cauHois->load('cauTraLois');
        return $deThi;
    }

    public function getById(int $id){
        return DeThi::findOrFail($id);
    }

    public function add(array $data)
    {
        return DeThi::create($data);
    }

    public function update(array $data, DeThi $deThi)
    {
        $deThi->update($data);
        return $deThi;
    }

    public function delete(DeThi $deThi)
    {
        return $deThi->delete();
    }

    public function get_osvien(User $user)
    { // lấy tất cả đề thi của sinh viên
        $user->load('nhomHocPhans.deThis');

        //map và tách các phần tử trong mảng con (dethis) ra 1 mảng
        $deThi = $user->nhomHocPhans->flatMap(
            function ($nhomHocPhan) {
                return $nhomHocPhan->deThis->load('monThi');
            }
        ) -> unique('id'); // tránh trường hợp đề thi chia cho 2 nhóm khác nhau
        $deThi;

        return $deThi;
    }

    public function getQuestions(int $deThiId)
    {
        $deThi = DeThi::findOrFail($deThiId);
        $deThi->load('cauHois');
        return $deThi->cauHois;
    }

    public function getAd(DeThi $deThi){
        $deThi->load(['cauHois', 'monThi', 'nhomHocPhans', 'cauHinhThi']);
        $deThi->cauHois->load('cauTraLois');
        return $deThi;
    }
}
