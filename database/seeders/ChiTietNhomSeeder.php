<?php

namespace Database\Seeders;

use App\Models\ChiTietNhom;
use App\Models\User;
use Illuminate\Database\Seeder;

class ChiTietNhomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chiTietNhoms = [
            // Nhóm 1
            ['sinhVienId' => 10, 'nhomHocPhanId' => 1],
            ['sinhVienId' => 11, 'nhomHocPhanId' => 1],
            ['sinhVienId' => 12, 'nhomHocPhanId' => 1],
            ['sinhVienId' => 13, 'nhomHocPhanId' => 1],
            ['sinhVienId' => 14, 'nhomHocPhanId' => 1],
            ['sinhVienId' => 15, 'nhomHocPhanId' => 1],
            ['sinhVienId' => 16, 'nhomHocPhanId' => 1],
            ['sinhVienId' => 17, 'nhomHocPhanId' => 1],
            ['sinhVienId' => 18, 'nhomHocPhanId' => 1],
            ['sinhVienId' => 19, 'nhomHocPhanId' => 1],

            // Nhóm 2
            ['sinhVienId' => 20, 'nhomHocPhanId' => 2],
            ['sinhVienId' => 21, 'nhomHocPhanId' => 2],
            ['sinhVienId' => 22, 'nhomHocPhanId' => 2],
            ['sinhVienId' => 23, 'nhomHocPhanId' => 2],
            ['sinhVienId' => 24, 'nhomHocPhanId' => 2],
            ['sinhVienId' => 25, 'nhomHocPhanId' => 2],
            ['sinhVienId' => 26, 'nhomHocPhanId' => 2],
            ['sinhVienId' => 27, 'nhomHocPhanId' => 2],
            ['sinhVienId' => 28, 'nhomHocPhanId' => 2],
            ['sinhVienId' => 29, 'nhomHocPhanId' => 2],

            // Nhóm 3
            ['sinhVienId' => 30, 'nhomHocPhanId' => 3],
            ['sinhVienId' => 3,  'nhomHocPhanId' => 3],
            ['sinhVienId' => 10, 'nhomHocPhanId' => 3],
            ['sinhVienId' => 11, 'nhomHocPhanId' => 3],
            ['sinhVienId' => 12, 'nhomHocPhanId' => 3],
            ['sinhVienId' => 13, 'nhomHocPhanId' => 3],
            ['sinhVienId' => 14, 'nhomHocPhanId' => 3],
            ['sinhVienId' => 15, 'nhomHocPhanId' => 3],
            ['sinhVienId' => 16, 'nhomHocPhanId' => 3],
            ['sinhVienId' => 17, 'nhomHocPhanId' => 3],

            // Nhóm 4
            ['sinhVienId' => 18, 'nhomHocPhanId' => 4],
            ['sinhVienId' => 19, 'nhomHocPhanId' => 4],
            ['sinhVienId' => 20, 'nhomHocPhanId' => 4],
            ['sinhVienId' => 21, 'nhomHocPhanId' => 4],
            ['sinhVienId' => 22, 'nhomHocPhanId' => 4],
            ['sinhVienId' => 23, 'nhomHocPhanId' => 4],
            ['sinhVienId' => 24, 'nhomHocPhanId' => 4],
            ['sinhVienId' => 25, 'nhomHocPhanId' => 4],
            ['sinhVienId' => 26, 'nhomHocPhanId' => 4],
            ['sinhVienId' => 27, 'nhomHocPhanId' => 4],
        ];

        foreach ($chiTietNhoms as $chiTietNhom) {
            ChiTietNhom::firstOrCreate(
                [
                    'sinhVienId' => $chiTietNhom['sinhVienId'],
                    'nhomHocPhanId' => $chiTietNhom['nhomHocPhanId']
                ],
                $chiTietNhom
            );
        }
    }
}
