<?php

namespace App\Services;

use App\Models\DeThi;

class DeThiService
{
    public function getAll()
    {
        return DeThi::all();
    }

    public function getOne(DeThi $deThi)
    {
        return $deThi;
    }

    public function add(array $data)
    {
        return DeThi::create($data);
    }

    public function update(array $data, DeThi $deThi)
    {
        $deThi->update($data);
        return $deThi;
    }

    public function delete(DeThi $deThi)
    {
        return $deThi->delete();
    }
}