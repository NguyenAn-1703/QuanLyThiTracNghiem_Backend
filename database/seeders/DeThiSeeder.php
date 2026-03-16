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
        $monCauTrucDuLieu = MonHoc::where('tenMonHoc','Cấu trúc dữ liệu và giải thuật')->first();
        $giangvien = User::where('username', 'giangvien')->first();

        $deThis = [
            [
                'monThiId' => $monLapTrinhC->id,
                'nguoiTaoId' => $giangvien->id,
                'tenDe' => 'Đề thi giữa kỳ Lập trình C',
                'thoiGianBatDau' => '2026-06-01 08:00:00',
                'thoiGianKetThuc' => '2026-06-01 10:00:00',
                'thoiGianLamBai' => 60,
                'isDeleted' => false,
                // 'createdAt' => now()
            ],
            [
                'monThiId' => $monCauTrucDuLieu->id,
                'nguoiTaoId' => $giangvien->id,
                'tenDe' => 'Đề thi giữa kỳ Cấu trúc dữ liệu',
                'thoiGianBatDau' => '2026-06-02 08:00:00',
                'thoiGianKetThuc' => '2026-06-02 10:00:00',
                'thoiGianLamBai' => 60,
                'isDeleted' => false,
                // 'createdAt' => now()
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
