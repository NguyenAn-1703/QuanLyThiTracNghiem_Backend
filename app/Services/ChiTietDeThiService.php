<?php

namespace App\Services;

use App\Models\ChiTietDeThi;

class ChiTietDeThiService
{
    public function getAll()
    {
        return ChiTietDeThi::all();
    }

    public function getOne(ChiTietDeThi $chiTietDeThi)
    {
        return $chiTietDeThi;
    }

    public function add(array $data)
    {
        //
    }

    public function update(array $data, ChiTietDeThi $chiTietDeThi)
    {
        //
    }

    public function delete(ChiTietDeThi $chiTietDeThi)
    {
        //
    }

    public function getChiTietDeThiById(int $deThiId, int $cauHoiId)
    {
        return ChiTietDeThi::where('deThiId', $deThiId)
            ->where('cauHoiId', $cauHoiId)
            ->firstOrFail();
    }

    public function addArr(array $data){
        return ChiTietDeThi::insert($data);
    }

    public function deleteByDeThiId(int $deThiId)
    {
        return ChiTietDeThi::where('deThiId', $deThiId)->delete();
    }
}
