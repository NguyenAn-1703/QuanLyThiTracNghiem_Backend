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
        $monCauTrucDuLieu = MonHoc::where('tenMonHoc', 'Cấu trúc dữ liệu và giải thuật')->first();
        $giangvien = User::where('username', 'giangvien')->first();

        $nhomHocPhans = [
            [
                'monHocId' => 1,
                'tenNhom' => 'Lập trình C - N1',
                'maMoi' => 'abcdef01',
                'notes' => 'Nhóm học phần môn Lập trình C',
                'hocKy' => 1,
                'namHoc' => 2025,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],
            [
                'monHocId' => 1,
                'tenNhom' => 'Lập trình C - N2',
                'maMoi' => 'abcdef02',
                'notes' => 'Nhóm học phần môn Lập trình C',
                'hocKy' => 2,
                'namHoc' => 2026,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],

            [
                'monHocId' => 2,
                'tenNhom' => 'Cấu trúc dữ liệu và giải thuật - N1',
                'maMoi' => 'abcdef03',
                'notes' => 'Nhóm học phần môn Cấu trúc dữ liệu và giải thuật',
                'hocKy' => 1,
                'namHoc' => 2025,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],
            [
                'monHocId' => 2,
                'tenNhom' => 'Cấu trúc dữ liệu và giải thuật - N2',
                'maMoi' => 'abcdef04',
                'notes' => 'Nhóm học phần môn Cấu trúc dữ liệu và giải thuật',
                'hocKy' => 2,
                'namHoc' => 2026,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],

            [
                'monHocId' => 3,
                'tenNhom' => 'Lập trình hướng đối tượng - N1',
                'maMoi' => 'abcdef05',
                'notes' => 'Nhóm học phần môn Lập trình hướng đối tượng',
                'hocKy' => 1,
                'namHoc' => 2025,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],
            [
                'monHocId' => 3,
                'tenNhom' => 'Lập trình hướng đối tượng - N2',
                'maMoi' => 'abcdef06',
                'notes' => 'Nhóm học phần môn Lập trình hướng đối tượng',
                'hocKy' => 2,
                'namHoc' => 2026,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],

            [
                'monHocId' => 4,
                'tenNhom' => 'Cơ sở dữ liệu - N1',
                'maMoi' => 'abcdef07',
                'notes' => 'Nhóm học phần môn Cơ sở dữ liệu',
                'hocKy' => 1,
                'namHoc' => 2025,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],
            [
                'monHocId' => 4,
                'tenNhom' => 'Cơ sở dữ liệu - N2',
                'maMoi' => 'abcdef08',
                'notes' => 'Nhóm học phần môn Cơ sở dữ liệu',
                'hocKy' => 2,
                'namHoc' => 2026,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],

            [
                'monHocId' => 5,
                'tenNhom' => 'Hệ điều hành - N1',
                'maMoi' => 'abcdef09',
                'notes' => 'Nhóm học phần môn Hệ điều hành',
                'hocKy' => 1,
                'namHoc' => 2025,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],
            [
                'monHocId' => 5,
                'tenNhom' => 'Hệ điều hành - N2',
                'maMoi' => 'abcdef10',
                'notes' => 'Nhóm học phần môn Hệ điều hành',
                'hocKy' => 2,
                'namHoc' => 2026,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],

            [
                'monHocId' => 6,
                'tenNhom' => 'Mạng máy tính - N1',
                'maMoi' => 'abcdef11',
                'notes' => 'Nhóm học phần môn Mạng máy tính',
                'hocKy' => 1,
                'namHoc' => 2025,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],
            [
                'monHocId' => 6,
                'tenNhom' => 'Mạng máy tính - N2',
                'maMoi' => 'abcdef12',
                'notes' => 'Nhóm học phần môn Mạng máy tính',
                'hocKy' => 2,
                'namHoc' => 2026,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],

            [
                'monHocId' => 7,
                'tenNhom' => 'Phân tích thiết kế hệ thống - N1',
                'maMoi' => 'abcdef13',
                'notes' => 'Nhóm học phần môn Phân tích thiết kế hệ thống',
                'hocKy' => 1,
                'namHoc' => 2025,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],
            [
                'monHocId' => 7,
                'tenNhom' => 'Phân tích thiết kế hệ thống - N2',
                'maMoi' => 'abcdef14',
                'notes' => 'Nhóm học phần môn Phân tích thiết kế hệ thống',
                'hocKy' => 2,
                'namHoc' => 2026,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],

            [
                'monHocId' => 8,
                'tenNhom' => 'Lập trình Java - N1',
                'maMoi' => 'abcdef15',
                'notes' => 'Nhóm học phần môn Lập trình Java',
                'hocKy' => 1,
                'namHoc' => 2025,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],
            [
                'monHocId' => 8,
                'tenNhom' => 'Lập trình Java - N2',
                'maMoi' => 'abcdef16',
                'notes' => 'Nhóm học phần môn Lập trình Java',
                'hocKy' => 2,
                'namHoc' => 2026,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],

            [
                'monHocId' => 9,
                'tenNhom' => 'Lập trình Web - N1',
                'maMoi' => 'abcdef17',
                'notes' => 'Nhóm học phần môn Lập trình Web',
                'hocKy' => 1,
                'namHoc' => 2025,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],
            [
                'monHocId' => 9,
                'tenNhom' => 'Lập trình Web - N2',
                'maMoi' => 'abcdef18',
                'notes' => 'Nhóm học phần môn Lập trình Web',
                'hocKy' => 2,
                'namHoc' => 2026,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],

            [
                'monHocId' => 10,
                'tenNhom' => 'Phát triển ứng dụng Web - N1',
                'maMoi' => 'abcdef19',
                'notes' => 'Nhóm học phần môn Phát triển ứng dụng Web',
                'hocKy' => 1,
                'namHoc' => 2025,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],
            [
                'monHocId' => 10,
                'tenNhom' => 'Phát triển ứng dụng Web - N2',
                'maMoi' => 'abcdef20',
                'notes' => 'Nhóm học phần môn Phát triển ứng dụng Web',
                'hocKy' => 2,
                'namHoc' => 2026,
                'giangVienId' => 2,
                'isHide' => false,
                'isDeleted' => false,
            ],
        ];

        foreach ($nhomHocPhans as $nhom) {
            NhomHocPhan::firstOrCreate(
                ['maMoi' => $nhom['maMoi']], // điều kiện kiểm tra trùng
                $nhom
            );
        }
    }
}
