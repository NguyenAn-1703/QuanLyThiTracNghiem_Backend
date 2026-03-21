<?php

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
}