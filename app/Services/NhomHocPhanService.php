<?php

namespace App\Services;

use App\Models\NhomHocPhan;

class NhomHocPhanService
{
    public function getAll()
    {
        return NhomHocPhan::all();
    }

    public function getOne(NhomHocPhan $nhomHocPhan)
    {
        return $nhomHocPhan;
    }

    public function add(array $data)
    {
        return NhomHocPhan::create($data);
    }

    public function update(array $data, NhomHocPhan $nhomHocPhan)
    {
        $nhomHocPhan->update($data);
        return $nhomHocPhan;
    }

    public function delete(NhomHocPhan $nhomHocPhan)
    {
        return $nhomHocPhan->delete();
    }
}