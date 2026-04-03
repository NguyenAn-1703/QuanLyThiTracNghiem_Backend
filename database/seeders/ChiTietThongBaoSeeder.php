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
            ['nhomHocPhanId' => 1, 'thongBaoId' => 1],
            ['nhomHocPhanId' => 1, 'thongBaoId' => 2],
            ['nhomHocPhanId' => 1, 'thongBaoId' => 3],
            ['nhomHocPhanId' => 1, 'thongBaoId' => 4],
            ['nhomHocPhanId' => 1, 'thongBaoId' => 5],

            ['nhomHocPhanId' => 2, 'thongBaoId' => 6],
            ['nhomHocPhanId' => 2, 'thongBaoId' => 7],
            ['nhomHocPhanId' => 2, 'thongBaoId' => 8],
            ['nhomHocPhanId' => 2, 'thongBaoId' => 9],
            ['nhomHocPhanId' => 2, 'thongBaoId' => 10],

            ['nhomHocPhanId' => 3, 'thongBaoId' => 11],
            ['nhomHocPhanId' => 3, 'thongBaoId' => 12],
            ['nhomHocPhanId' => 3, 'thongBaoId' => 13],
            ['nhomHocPhanId' => 3, 'thongBaoId' => 14],
            ['nhomHocPhanId' => 3, 'thongBaoId' => 15],

            ['nhomHocPhanId' => 4, 'thongBaoId' => 16],
            ['nhomHocPhanId' => 4, 'thongBaoId' => 17],
            ['nhomHocPhanId' => 4, 'thongBaoId' => 18],
            ['nhomHocPhanId' => 4, 'thongBaoId' => 19],
            ['nhomHocPhanId' => 4, 'thongBaoId' => 20],

            ['nhomHocPhanId' => 5, 'thongBaoId' => 1],
            ['nhomHocPhanId' => 5, 'thongBaoId' => 2],
            ['nhomHocPhanId' => 5, 'thongBaoId' => 3],
            ['nhomHocPhanId' => 5, 'thongBaoId' => 4],
            ['nhomHocPhanId' => 5, 'thongBaoId' => 5],

            ['nhomHocPhanId' => 6, 'thongBaoId' => 6],
            ['nhomHocPhanId' => 6, 'thongBaoId' => 7],
            ['nhomHocPhanId' => 6, 'thongBaoId' => 8],
            ['nhomHocPhanId' => 6, 'thongBaoId' => 9],
            ['nhomHocPhanId' => 6, 'thongBaoId' => 10],

            ['nhomHocPhanId' => 7, 'thongBaoId' => 11],
            ['nhomHocPhanId' => 7, 'thongBaoId' => 12],
            ['nhomHocPhanId' => 7, 'thongBaoId' => 13],
            ['nhomHocPhanId' => 7, 'thongBaoId' => 14],
            ['nhomHocPhanId' => 7, 'thongBaoId' => 15],

            ['nhomHocPhanId' => 8, 'thongBaoId' => 16],
            ['nhomHocPhanId' => 8, 'thongBaoId' => 17],
            ['nhomHocPhanId' => 8, 'thongBaoId' => 18],
            ['nhomHocPhanId' => 8, 'thongBaoId' => 19],
            ['nhomHocPhanId' => 8, 'thongBaoId' => 20],

            ['nhomHocPhanId' => 9, 'thongBaoId' => 1],
            ['nhomHocPhanId' => 9, 'thongBaoId' => 2],
            ['nhomHocPhanId' => 9, 'thongBaoId' => 3],
            ['nhomHocPhanId' => 9, 'thongBaoId' => 4],
            ['nhomHocPhanId' => 9, 'thongBaoId' => 5],

            ['nhomHocPhanId' => 10, 'thongBaoId' => 6],
            ['nhomHocPhanId' => 10, 'thongBaoId' => 7],
            ['nhomHocPhanId' => 10, 'thongBaoId' => 8],
            ['nhomHocPhanId' => 10, 'thongBaoId' => 9],
            ['nhomHocPhanId' => 10, 'thongBaoId' => 10],
        ];

        ChiTietThongBao::upsert(
            $chiTietThongBaos,
            ['nhomHocPhanId', 'thongBaoId'], // khóa xác định trùng
            [] // không update gì khi trùng
        );
    }
}
