<?php

use App\Models\ChiTietBaiLam;
use Illuminate\Support\Facades\DB;

class ChiTietBaiLamService{
    public function getAll()
    {
        return ChiTietBaiLam::all();
    }

    public function getOne(ChiTietBaiLam $chiTietBaiLam)
    {
        return $chiTietBaiLam;
    }

    public function add(array $data)
    {
        return ChiTietBaiLam::create($data);
    }

    public function update(array $data, ChiTietBaiLam $chiTietBaiLam)
    {
        $chiTietBaiLam->update($data);
        return $chiTietBaiLam;
    }

    public function delete(ChiTietBaiLam $chiTietBaiLam)
    {
        return $chiTietBaiLam->delete();
    }

    public function addMany(array $chiTietArray)
    {
        return DB::transaction(function() use ($chiTietArray) {
            $results = [];
            foreach ($chiTietArray as $data) {
                $results[] = ChiTietBaiLam::create($data);
            }
            return $results;
        });
    }
}