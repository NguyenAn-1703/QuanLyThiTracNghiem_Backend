<?php

use App\Models\ChiTietDeThi;

class ChiTietDeThiService{
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
}