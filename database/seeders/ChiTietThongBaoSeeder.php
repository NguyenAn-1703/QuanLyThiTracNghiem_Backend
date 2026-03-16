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
        $giangvien = User::where('username', 'giangvien')->first();
        $chiTietThongBaos = [
            [
                'taiKhoanId' => $giangvien->id,
                'thongBaoId' => 1,
            ],
            [
                'taiKhoanId' => $giangvien->id,
                'thongBaoId' => 2,
            ],
        ];

        foreach ($chiTietThongBaos as $chiTietThongBao) {
            ChiTietThongBao::firstOrCreate(
                [
                    'taiKhoanId' => $chiTietThongBao['taiKhoanId'],
                    'thongBaoId' => $chiTietThongBao['thongBaoId']
                ],
                $chiTietThongBao
            );
        }
    }
}
