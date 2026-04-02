<?php

namespace App\Services;

use App\Models\GiaoBaiThi;

class GiaoBaiThiService
{
    public function getAll()
    {
        return GiaoBaiThi::all();
    }

    public function getOne(GiaoBaiThi $giaoBaiThi)
    {
        return $giaoBaiThi;
    }

    public function add(array $data)
    {
        return GiaoBaiThi::create($data);
    }

    public function update(array $data, GiaoBaiThi $giaoBaiThi)
    {
        $giaoBaiThi->update($data);
        return $giaoBaiThi;
    }

    public function delete(GiaoBaiThi $giaoBaiThi)
    {
        return $giaoBaiThi->delete();
    }

    public function addArr(array $data)
    {
        return GiaoBaiThi::insert($data);
    }

    public function deleteByDeThiId(int $deThiId)
    {
        return GiaoBaiThi::where('deThiId', $deThiId)->delete();
    }
}
