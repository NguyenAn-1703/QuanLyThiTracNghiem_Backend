<?php

namespace Database\Seeders;

use App\Models\Chuong;
use Illuminate\Database\Seeder;

class ChuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chuongs = [
            [
                'tenChuong' => 'Giới thiệu môn học',
                'monHocId' => 1,
                'isDeleted' => false,
            ],
            [
                'tenChuong' => 'Cú pháp cơ bản',
                'monHocId' => 1,
                'isDeleted' => false,
            ],
            [
                'tenChuong' => 'Cấu trúc dữ liệu',
                'monHocId' => 2,
                'isDeleted' => false,
            ],
        ];

        foreach ($chuongs as $chuong) {
            Chuong::firstOrCreate(
                ['tenChuong' => $chuong['tenChuong'], 'monHocId' => $chuong['monHocId']],
                $chuong
            );
        }
    }
}
