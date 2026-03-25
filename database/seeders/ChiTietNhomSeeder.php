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
        $sinhvien = User::where("username","sinhvien")->first();
        $chiTietNhoms = [
            [
                'sinhVienId' => $sinhvien->id,
                'nhomHocPhanId' => 1,
            ],
            [
                'sinhVienId' => $sinhvien->id,
                'nhomHocPhanId' => 2,
            ],
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
