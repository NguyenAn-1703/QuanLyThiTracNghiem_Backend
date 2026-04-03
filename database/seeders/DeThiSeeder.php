<?php

namespace Database\Seeders;

use App\Models\DeThi;
use App\Models\MonHoc;
use App\Models\User;
use Illuminate\Database\Seeder;

class DeThiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monLapTrinhC = MonHoc::where('tenMonHoc', 'Lập trình C')->first();
        $monCauTrucDuLieu = MonHoc::where('tenMonHoc', 'Cấu trúc dữ liệu và giải thuật')->first();
        $giangvien = User::where('username', 'giangvien')->first();

        $deThis = [
            [
                'monThiId' => 1,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi giữa kỳ Lập trình C',
                'thoiGianBatDau' => '2026-03-01 08:00:00',
                'thoiGianKetThuc' => '2026-03-01 08:30:00',
                'thoiGianLamBai' => 30,
                'isDeleted' => false,
            ],
            [
                'monThiId' => 1,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi cuối kỳ Lập trình C',
                'thoiGianBatDau' => '2026-03-10 08:00:00',
                'thoiGianKetThuc' => '2026-03-10 08:45:00',
                'thoiGianLamBai' => 45,
                'isDeleted' => false,
            ],

            [
                'monThiId' => 2,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi giữa kỳ Cấu trúc dữ liệu và giải thuật',
                'thoiGianBatDau' => '2026-03-02 08:00:00',
                'thoiGianKetThuc' => '2026-03-02 08:30:00',
                'thoiGianLamBai' => 30,
                'isDeleted' => false,
            ],
            [
                'monThiId' => 2,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi cuối kỳ Cấu trúc dữ liệu và giải thuật',
                'thoiGianBatDau' => '2026-03-11 08:00:00',
                'thoiGianKetThuc' => '2026-03-11 08:45:00',
                'thoiGianLamBai' => 45,
                'isDeleted' => false,
            ],

            [
                'monThiId' => 3,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi giữa kỳ Lập trình hướng đối tượng',
                'thoiGianBatDau' => '2026-03-03 08:00:00',
                'thoiGianKetThuc' => '2026-03-03 08:30:00',
                'thoiGianLamBai' => 30,
                'isDeleted' => false,
            ],
            [
                'monThiId' => 3,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi cuối kỳ Lập trình hướng đối tượng',
                'thoiGianBatDau' => '2026-03-12 08:00:00',
                'thoiGianKetThuc' => '2026-03-12 08:45:00',
                'thoiGianLamBai' => 45,
                'isDeleted' => false,
            ],

            [
                'monThiId' => 4,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi giữa kỳ Cơ sở dữ liệu',
                'thoiGianBatDau' => '2026-03-04 08:00:00',
                'thoiGianKetThuc' => '2026-03-04 08:30:00',
                'thoiGianLamBai' => 30,
                'isDeleted' => false,
            ],
            [
                'monThiId' => 4,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi cuối kỳ Cơ sở dữ liệu',
                'thoiGianBatDau' => '2026-03-13 08:00:00',
                'thoiGianKetThuc' => '2026-03-13 08:45:00',
                'thoiGianLamBai' => 45,
                'isDeleted' => false,
            ],

            [
                'monThiId' => 5,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi giữa kỳ Hệ điều hành',
                'thoiGianBatDau' => '2026-03-05 08:00:00',
                'thoiGianKetThuc' => '2026-03-05 08:30:00',
                'thoiGianLamBai' => 30,
                'isDeleted' => false,
            ],
            [
                'monThiId' => 5,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi cuối kỳ Hệ điều hành',
                'thoiGianBatDau' => '2026-03-14 08:00:00',
                'thoiGianKetThuc' => '2026-03-14 08:45:00',
                'thoiGianLamBai' => 45,
                'isDeleted' => false,
            ],

            [
                'monThiId' => 6,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi giữa kỳ Mạng máy tính',
                'thoiGianBatDau' => '2026-03-06 08:00:00',
                'thoiGianKetThuc' => '2026-03-06 08:30:00',
                'thoiGianLamBai' => 30,
                'isDeleted' => false,
            ],
            [
                'monThiId' => 6,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi cuối kỳ Mạng máy tính',
                'thoiGianBatDau' => '2026-03-15 08:00:00',
                'thoiGianKetThuc' => '2026-03-15 08:45:00',
                'thoiGianLamBai' => 45,
                'isDeleted' => false,
            ],

            [
                'monThiId' => 7,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi giữa kỳ Phân tích thiết kế hệ thống',
                'thoiGianBatDau' => '2026-03-07 08:00:00',
                'thoiGianKetThuc' => '2026-03-07 08:30:00',
                'thoiGianLamBai' => 30,
                'isDeleted' => false,
            ],
            [
                'monThiId' => 7,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi cuối kỳ Phân tích thiết kế hệ thống',
                'thoiGianBatDau' => '2026-03-16 08:00:00',
                'thoiGianKetThuc' => '2026-03-16 08:45:00',
                'thoiGianLamBai' => 45,
                'isDeleted' => false,
            ],

            [
                'monThiId' => 8,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi giữa kỳ Lập trình Java',
                'thoiGianBatDau' => '2026-03-08 08:00:00',
                'thoiGianKetThuc' => '2026-03-08 08:30:00',
                'thoiGianLamBai' => 30,
                'isDeleted' => false,
            ],
            [
                'monThiId' => 8,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi cuối kỳ Lập trình Java',
                'thoiGianBatDau' => '2026-03-17 08:00:00',
                'thoiGianKetThuc' => '2026-03-17 08:45:00',
                'thoiGianLamBai' => 45,
                'isDeleted' => false,
            ],

            [
                'monThiId' => 9,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi giữa kỳ Lập trình Web',
                'thoiGianBatDau' => '2026-03-09 08:00:00',
                'thoiGianKetThuc' => '2026-03-09 08:30:00',
                'thoiGianLamBai' => 30,
                'isDeleted' => false,
            ],
            [
                'monThiId' => 9,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi cuối kỳ Lập trình Web',
                'thoiGianBatDau' => '2026-03-18 08:00:00',
                'thoiGianKetThuc' => '2026-03-18 08:45:00',
                'thoiGianLamBai' => 45,
                'isDeleted' => false,
            ],

            [
                'monThiId' => 10,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi giữa kỳ Phát triển ứng dụng Web',
                'thoiGianBatDau' => '2026-03-10 13:00:00',
                'thoiGianKetThuc' => '2026-03-10 13:30:00',
                'thoiGianLamBai' => 30,
                'isDeleted' => false,
            ],
            [
                'monThiId' => 10,
                'nguoiTaoId' => 2,
                'tenDe' => 'Đề thi cuối kỳ Phát triển ứng dụng Web',
                'thoiGianBatDau' => '2026-03-19 13:00:00',
                'thoiGianKetThuc' => '2026-03-19 13:45:00',
                'thoiGianLamBai' => 45,
                'isDeleted' => false,
            ],
        ];

        foreach ($deThis as $deThi) {
            DeThi::firstOrCreate(
                ['tenDe' => $deThi['tenDe']], // tránh tạo trùng
                $deThi
            );
        }
    }
}
