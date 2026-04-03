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
            ['giangVienId' => 2, 'monHocId' => 1],
            ['giangVienId' => 4, 'monHocId' => 2],
            ['giangVienId' => 5, 'monHocId' => 3],
            ['giangVienId' => 6, 'monHocId' => 4],
            ['giangVienId' => 7, 'monHocId' => 5],
            ['giangVienId' => 8, 'monHocId' => 6],
            ['giangVienId' => 9, 'monHocId' => 7],
            ['giangVienId' => 10, 'monHocId' => 8],
            ['giangVienId' => 2, 'monHocId' => 9],
            ['giangVienId' => 4, 'monHocId' => 10],

            ['giangVienId' => 5, 'monHocId' => 1],
            ['giangVienId' => 6, 'monHocId' => 2],
            ['giangVienId' => 7, 'monHocId' => 3],
            ['giangVienId' => 8, 'monHocId' => 4],
            ['giangVienId' => 9, 'monHocId' => 5],
            ['giangVienId' => 10, 'monHocId' => 6],
            ['giangVienId' => 2, 'monHocId' => 7],
            ['giangVienId' => 4, 'monHocId' => 8],
            ['giangVienId' => 5, 'monHocId' => 9],
            ['giangVienId' => 6, 'monHocId' => 10],
        ];

        PhanCong::upsert(
            $phanCongs,
            ['giangVienId', 'monHocId'], // khóa xác định trùng
            [] // không update gì khi trùng
        );
    }
}
