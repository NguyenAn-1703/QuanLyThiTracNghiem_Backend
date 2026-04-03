<?php

namespace Database\Seeders;

use App\Models\MonHoc;
use Illuminate\Database\Seeder;

class MonHocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $monHocs = [
            [
                'tenMonHoc' => 'Lập trình C',
                'maMonHoc' => '841255',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Cấu trúc dữ liệu và giải thuật',
                'maMonHoc' => '841244',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Lập trình hướng đối tượng',
                'maMonHoc' => '841301',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Cơ sở dữ liệu',
                'maMonHoc' => '841312',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Hệ điều hành',
                'maMonHoc' => '841333',
                'soTinChi' => 4,
                'soTietLyThuyet' => 45,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Mạng máy tính',
                'maMonHoc' => '841347',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Phân tích thiết kế hệ thống',
                'maMonHoc' => '841358',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Lập trình Java',
                'maMonHoc' => '841369',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Lập trình Web',
                'maMonHoc' => '841371',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Phát triển ứng dụng Web',
                'maMonHoc' => '841382',
                'soTinChi' => 4,
                'soTietLyThuyet' => 45,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Công nghệ phần mềm',
                'maMonHoc' => '841393',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Kiểm thử phần mềm',
                'maMonHoc' => '841404',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'An toàn thông tin',
                'maMonHoc' => '841415',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Trí tuệ nhân tạo',
                'maMonHoc' => '841426',
                'soTinChi' => 4,
                'soTietLyThuyet' => 45,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Học máy',
                'maMonHoc' => '841437',
                'soTinChi' => 4,
                'soTietLyThuyet' => 45,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Khai phá dữ liệu',
                'maMonHoc' => '841448',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Xử lý ảnh',
                'maMonHoc' => '841459',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Lập trình di động',
                'maMonHoc' => '841460',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Phát triển ứng dụng Android',
                'maMonHoc' => '841471',
                'soTinChi' => 4,
                'soTietLyThuyet' => 45,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
            [
                'tenMonHoc' => 'Điện toán đám mây',
                'maMonHoc' => '841482',
                'soTinChi' => 3,
                'soTietLyThuyet' => 30,
                'soTietThucHanh' => 30,
                'isDeleted' => false
            ],
        ];

        foreach ($monHocs as $monHoc) {
            MonHoc::firstOrCreate(
                ['maMonHoc' => $monHoc['maMonHoc']], // điều kiện tránh trùng
                $monHoc
            );
        }
    }
}
