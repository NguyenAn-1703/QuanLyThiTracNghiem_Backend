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
            ['deThiId' => 1,  'nhomHocPhanId' => 1,  'thoiGianBatDau' => '2026-03-01 08:00:00', 'thoiGianKetThuc' => '2026-03-01 08:30:00'],
            ['deThiId' => 2,  'nhomHocPhanId' => 1,  'thoiGianBatDau' => '2026-03-10 08:00:00', 'thoiGianKetThuc' => '2026-03-10 08:45:00'],

            ['deThiId' => 3,  'nhomHocPhanId' => 2,  'thoiGianBatDau' => '2026-03-02 08:00:00', 'thoiGianKetThuc' => '2026-03-02 08:30:00'],
            ['deThiId' => 4,  'nhomHocPhanId' => 2,  'thoiGianBatDau' => '2026-03-11 08:00:00', 'thoiGianKetThuc' => '2026-03-11 08:45:00'],

            ['deThiId' => 5,  'nhomHocPhanId' => 3,  'thoiGianBatDau' => '2026-03-03 08:00:00', 'thoiGianKetThuc' => '2026-03-03 08:30:00'],
            ['deThiId' => 6,  'nhomHocPhanId' => 3,  'thoiGianBatDau' => '2026-03-12 08:00:00', 'thoiGianKetThuc' => '2026-03-12 08:45:00'],

            ['deThiId' => 7,  'nhomHocPhanId' => 4,  'thoiGianBatDau' => '2026-03-04 08:00:00', 'thoiGianKetThuc' => '2026-03-04 08:30:00'],
            ['deThiId' => 8,  'nhomHocPhanId' => 4,  'thoiGianBatDau' => '2026-03-13 08:00:00', 'thoiGianKetThuc' => '2026-03-13 08:45:00'],

            ['deThiId' => 9,  'nhomHocPhanId' => 5,  'thoiGianBatDau' => '2026-03-05 08:00:00', 'thoiGianKetThuc' => '2026-03-05 08:30:00'],
            ['deThiId' => 10, 'nhomHocPhanId' => 5,  'thoiGianBatDau' => '2026-03-14 08:00:00', 'thoiGianKetThuc' => '2026-03-14 08:45:00'],

            ['deThiId' => 11, 'nhomHocPhanId' => 6,  'thoiGianBatDau' => '2026-03-06 08:00:00', 'thoiGianKetThuc' => '2026-03-06 08:30:00'],
            ['deThiId' => 12, 'nhomHocPhanId' => 6,  'thoiGianBatDau' => '2026-03-15 08:00:00', 'thoiGianKetThuc' => '2026-03-15 08:45:00'],

            ['deThiId' => 13, 'nhomHocPhanId' => 7,  'thoiGianBatDau' => '2026-03-07 08:00:00', 'thoiGianKetThuc' => '2026-03-07 08:30:00'],
            ['deThiId' => 14, 'nhomHocPhanId' => 7,  'thoiGianBatDau' => '2026-03-16 08:00:00', 'thoiGianKetThuc' => '2026-03-16 08:45:00'],

            ['deThiId' => 15, 'nhomHocPhanId' => 8,  'thoiGianBatDau' => '2026-03-08 08:00:00', 'thoiGianKetThuc' => '2026-03-08 08:30:00'],
            ['deThiId' => 16, 'nhomHocPhanId' => 8,  'thoiGianBatDau' => '2026-03-17 08:00:00', 'thoiGianKetThuc' => '2026-03-17 08:45:00'],

            ['deThiId' => 17, 'nhomHocPhanId' => 9,  'thoiGianBatDau' => '2026-03-09 08:00:00', 'thoiGianKetThuc' => '2026-03-09 08:30:00'],
            ['deThiId' => 18, 'nhomHocPhanId' => 9,  'thoiGianBatDau' => '2026-03-18 08:00:00', 'thoiGianKetThuc' => '2026-03-18 08:45:00'],

            ['deThiId' => 19, 'nhomHocPhanId' => 10, 'thoiGianBatDau' => '2026-03-10 13:00:00', 'thoiGianKetThuc' => '2026-03-10 13:30:00'],
            ['deThiId' => 20, 'nhomHocPhanId' => 10, 'thoiGianBatDau' => '2026-03-19 13:00:00', 'thoiGianKetThuc' => '2026-03-19 13:45:00'],
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
