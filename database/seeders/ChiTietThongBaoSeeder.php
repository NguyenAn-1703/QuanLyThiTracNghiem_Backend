<?php

namespace Database\Seeders;

use App\Models\ChiTietThongBao;
use App\Models\User;
use Illuminate\Database\Seeder;

class ChiTietThongBaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chiTietThongBaos = [
            [
                'nhomHocPhanId' => 1,
                'thongBaoId' => 1,
            ],
            [
                'nhomHocPhanId' => 2,
                'thongBaoId' => 2,
            ],
        ];

        foreach ($chiTietThongBaos as $chiTietThongBao) {
            ChiTietThongBao::firstOrCreate(
                [
                    'nhomHocPhanId' => $chiTietThongBao['nhomHocPhanId'],
                    'thongBaoId' => $chiTietThongBao['thongBaoId']
                ],
                $chiTietThongBao
            );
        }
    }
}
