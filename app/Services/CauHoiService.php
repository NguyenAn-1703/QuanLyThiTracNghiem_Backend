<?php

namespace App\Services;
use App\Models\CauHoi;

class CauHoiService{
    public function getAll()
    {
        return CauHoi::all();
    }

    public function getOne(CauHoi $cauHoi)
    {
        return $cauHoi;
    }

    public function add(array $data)
    {
        //
    }

    public function update(array $data, CauHoi $cauHoi)
    {
        //
    }

    public function delete(CauHoi $cauHoi)
    {
        //
    }

    public function getById(int $id){
        $cauHoi = CauHoi::findOrFail($id);
        return $cauHoi;
    }

    public function getCauTraLois(int $id){
        $cauHoi = CauHoi::findOrFail($id);
        $cauHoi->load('cauTraLois');
        return $cauHoi->cauTraLois;
    }
}