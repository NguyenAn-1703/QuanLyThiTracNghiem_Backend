<?php

namespace App\Services;

use App\Models\Chuong;

class ChuongService
{
    public function create(array $data): Chuong
    {
        return Chuong::create($data);
    }

    public function update(Chuong $chuong, array $data): Chuong
    {
        $chuong->update($data);
        return $chuong;
    }
}
