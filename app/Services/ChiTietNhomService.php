<?php

namespace App\Services;

use App\Models\ChiTietNhom;

class ChiTietNhomService
{
    public function getAll()
    {
        return ChiTietNhom::all();
    }

    public function getOne(ChiTietNhom $chiTietNhom)
    {
        return $chiTietNhom;
    }

    public function add(array $data)
    {
        return ChiTietNhom::create($data);
    }

    public function update(array $data, ChiTietNhom $chiTietNhom)
    {
        $chiTietNhom->update($data);
        return $chiTietNhom;
    }

    public function delete(ChiTietNhom $chiTietNhom)
    {
        return $chiTietNhom->delete();
    }
}