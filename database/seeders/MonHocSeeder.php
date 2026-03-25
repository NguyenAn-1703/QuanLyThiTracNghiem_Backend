<?php

namespace Database\Seeders;

use App\Models\MonHoc;
use Illuminate\Database\Seeder;

class MonHocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monHocs = [
            [
                'tenMonHoc' => 'Lập trình C',
                'maMonHoc' => '841255',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Cấu trúc dữ liệu và giải thuật',
                'maMonHoc' => '841244',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
        ];

        foreach ($monHocs as $monHoc) {
            MonHoc::firstOrCreate(
                ['maMonHoc' => $monHoc['maMonHoc']], // điều kiện tránh trùng
                $monHoc
            );
        }
    }
}
