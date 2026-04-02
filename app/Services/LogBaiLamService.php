<?php

namespace App\Services;

use App\Models\BaiLam;
use App\Models\LogBaiLam;

class LogBaiLamService{
    public function getAll()
    {
        return LogBaiLam::all();
    }

    public function getOne(LogBaiLam $logBaiLam)
    {
        return $logBaiLam;
    }

    public function add(array $data)
    {
        return LogBaiLam::create($data);
    }

    public function update(array $data, BaiLam $bailam)
    {
        return LogBaiLam::where('baiLamId', $bailam->id)
        ->update($data);
    }

    public function delete(LogBaiLam $logBaiLam)
    {
        return $logBaiLam->delete();
    }
}