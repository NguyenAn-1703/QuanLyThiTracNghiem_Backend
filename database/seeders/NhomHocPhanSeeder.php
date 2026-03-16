<?php

namespace Database\Seeders;

use App\Models\MonHoc;
use App\Models\NhomHocPhan;
use App\Models\User;
use Illuminate\Database\Seeder;

class NhomHocPhanSeeder extends Seeder
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
        
        $nhomHocPhans = [
            [
                'monHocId' => $monLapTrinhC->id,
                'tenNhom' => 'Lập trình C',
                'maMoi' => 'LapTrinhC',
                'siSo' => 30,
                'notes' => 'Nhóm học phần môn lập trình C',
                'hocKy' => 1,
                'namHoc' => 2025,
                'giangVienId' => $giangvien->id,
                'isHide' => false,
                'isDeleted' => false,
            ],
            [
                'monHocId' => $monCauTrucDuLieu->id,
                'tenNhom' => 'Nhóm Cấu trúc dữ liệu 01',
                'maMoi' => 'CTDL01',
                'siSo' => 25,
                'notes' => 'Nhóm học phần môn cấu trúc dữ liệu',
                'hocKy' => 1,
                'namHoc' => 2025,
                'giangVienId' => $giangvien->id,
                'isHide' => false,
                'isDeleted' => false,
            ]
        ];

        foreach ($nhomHocPhans as $nhom) {
            NhomHocPhan::firstOrCreate(
                ['maMoi' => $nhom['maMoi']], // điều kiện kiểm tra trùng
                $nhom
            );
        }
    }
}
