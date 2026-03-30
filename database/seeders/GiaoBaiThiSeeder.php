<?php

namespace Database\Seeders;

use App\Models\GiaoBaiThi;
use Illuminate\Database\Seeder;

class GiaoBaiThiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $giaoBaiThis = [
            [
                'deThiId' => 1,
                'nhomHocPhanId' => 1,
                'thoiGianBatDau' => '2026-06-01 08:00:00',
                'thoiGianKetThuc' => '2026-06-01 09:00:00',
            ],
            [
                'deThiId' => 1,
                'nhomHocPhanId' => 2,
                'thoiGianBatDau' => '2026-06-01 10:00:00',
                'thoiGianKetThuc' => '2026-06-01 11:00:00',
            ],
            [
                'deThiId' => 2,
                'nhomHocPhanId' => 3,
                'thoiGianBatDau' => '2026-06-02 08:00:00',
                'thoiGianKetThuc' => '2026-06-02 09:00:00',
            ],
            [
                'deThiId' => 2,
                'nhomHocPhanId' => 4,
                'thoiGianBatDau' => '2026-06-03 13:30:00',
                'thoiGianKetThuc' => '2026-06-03 15:00:00',
            ],
        ];

        foreach ($giaoBaiThis as $giaoBaiThi) {
            GiaoBaiThi::firstOrCreate(
                [
                    'deThiId' => $giaoBaiThi['deThiId'],
                    'nhomHocPhanId' => $giaoBaiThi['nhomHocPhanId']
                ],
                $giaoBaiThi
            );
        }
    }
}
