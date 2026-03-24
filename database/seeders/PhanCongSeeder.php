<?php

namespace Database\Seeders;

use App\Models\MonHoc;
use App\Models\PhanCong;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhanCongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lấy giảng viên
        $giangVien = User::where("username", "giangvien")->first();

        $monHoc1 = MonHoc::where("maMonHoc", "841255")->first();
        $monHoc2 = MonHoc::where("maMonHoc", "841244")->first();

        $phanCongs = [
            [
                'giangVienId' => $giangVien->id,
                'monHocId' => $monHoc1->id,
            ],
            [
                'giangVienId' => $giangVien->id,
                'monHocId' => $monHoc2->id,
            ],
        ];

        foreach ($phanCongs as $phanCong) {
            PhanCong::firstOrCreate(
                [
                    'giangVienId' => $phanCong['giangVienId'],
                    'monHocId' => $phanCong['monHocId'],
                ],
                $phanCong
            );
        }
    }
}
