<?php

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

    public function update(array $data, LogBaiLam $logBaiLam)
    {
        $logBaiLam->update($data);
        return $logBaiLam;
    }

    public function delete(LogBaiLam $logBaiLam)
    {
        return $logBaiLam->delete();
    }
}