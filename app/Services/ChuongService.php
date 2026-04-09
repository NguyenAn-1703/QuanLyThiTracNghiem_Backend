<?php

namespace App\Services;

use App\Models\Chuong;
use App\Models\MonHoc;
use Illuminate\Support\Facades\DB;

class ChuongService
{
    public function create(array $data): Chuong
    {
        return Chuong::create($data);
    }

    public function update(MonHoc $monhoc, array $data)
    {
        return DB::transaction(function () use ($monhoc, $data) {

            $monhoc->chuongs()->delete();

            $chuongs = collect($data['chuongs'])->map(function ($item) use ($monhoc) {
                $item['monHocId'] = $monhoc->id; // Thêm thuộc tính maMonHoc
                return $item;
            })->toArray();

            $monhoc->chuongs()->insert($chuongs);

            return $monhoc->load('chuongs'); // Trả về model kèm quan hệ mới
        });
    }

    public function getByMonHoc(MonHoc $monHoc)
    {
        return $monHoc->chuongs;
    }
}
