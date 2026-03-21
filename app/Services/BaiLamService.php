<?php

use App\Models\BaiLam;

class BaiLamService{
    public function getAll()
    {
        return BaiLam::all();
    }

    public function getOne(BaiLam $baiLam)
    {
        return $baiLam;
    }

    public function add(array $data)
    {
        return BaiLam::create($data);
    }

    public function update(array $data, BaiLam $baiLam)
    {
        $baiLam->update($data);
        return $baiLam;
    }

    public function delete(BaiLam $baiLam)
    {
        return $baiLam->delete();
    }
}