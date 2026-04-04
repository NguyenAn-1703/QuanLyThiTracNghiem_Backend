<?php

namespace Database\Seeders;

use App\Models\BaiLam;
use App\Models\DeThi;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class BaiLamSeeder extends Seeder
{
    public function run()
    {
        $student = User::where('username', 'sinhvien')->first();

        // 'tenDe' => 'Đề thi giữa kỳ Lập trình C',
        // 'tenDe' => 'Đề thi giữa kỳ Cấu trúc dữ liệu',
        // lấy 2 đề 
        $deThi1 = DeThi::where('tenDe', 'Đề thi giữa kỳ Lập trình C')->first();
        $deThi2 = DeThi::where('tenDe', 'Đề thi giữa kỳ Cấu trúc dữ liệu và giải thuật')->first();

        $now = Date::now();

        $baiLams = [
            // 🟡 ĐANG LÀM
            [
                'thiSinhId' => $student->id,
                'deThiId' => $deThi1->id,
                'thoiGianBatDau' => $now->copy()->subMinutes(30),
                'thoiGianNopBai' => null,
                'tongDiem' => null,
                'soCauDung' => null,
                'status' => 'DANG_LAM',
                'updated_at' => $now,
            ],

            // 🔵 TẠM LƯU
            [
                'thiSinhId' => $student->id,
                'deThiId' => $deThi2->id,
                'thoiGianBatDau' => $now->copy()->subHours(2),
                'thoiGianNopBai' => null,
                'tongDiem' => null,
                'soCauDung' => 5,
                'status' => 'TAM_LUU',
                'updated_at' => $now->copy()->subMinutes(10),
            ],

            // 🟢 ĐÃ NỘP
            [
                'thiSinhId' => $student->id,
                'deThiId' => $deThi1->id,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],

            // 🔴 BỊ HỦY
            [
                'thiSinhId' => $student->id,
                'deThiId' => $deThi2->id,
                'thoiGianBatDau' => $now->copy()->subDays(3),
                'thoiGianNopBai' => null,
                'tongDiem' => null,
                'soCauDung' => 10,
                'status' => 'BI_HUY',
                'updated_at' => $now->copy()->subDays(3),
            ],

            [
                'thiSinhId' => 10,
                'deThiId' => 5,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 11,
                'deThiId' => 5,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 12,
                'deThiId' => 5,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 13,
                'deThiId' => 5,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 14,
                'deThiId' => 5,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 15,
                'deThiId' => 5,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 16,
                'deThiId' => 5,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 17,
                'deThiId' => 5,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],

            [
                'thiSinhId' => 10,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 11,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 12,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 13,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 14,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 15,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 16,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 17,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 18,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 19,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 20,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 21,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 22,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 23,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 24,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 25,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 26,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
            [
                'thiSinhId' => 27,
                'deThiId' => 1,
                'thoiGianBatDau' => $now->copy()->subDays(1)->subHours(1),
                'thoiGianNopBai' => $now->copy()->subDays(1),
                'tongDiem' => 8.75,
                'soCauDung' => 35,
                'status' => 'DA_NOP',
                'updated_at' => $now->copy()->subDays(1),
            ],
        ];

        BaiLam::upsert(
            $baiLams,
            ['thiSinhId', 'deThiId'], // key xác định trùng
            [] // không update gì khi trùng
        );
    }
}
