<?php

namespace Database\Seeders;

use App\Models\CauHoi;
use App\Models\MonHoc;
use App\Models\User;
use Illuminate\Database\Seeder;

class CauHoiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lấy dữ liệu liên quan
        $teacher = User::where('username', 'giangvien')->first();
        $monLapTrinhC = MonHoc::where('tenMonHoc', 'Lập trình C')->first();
        $monCTDL = MonHoc::where('tenMonHoc', 'Cấu trúc dữ liệu và giải thuật')->first();

        $cauHois = [
            [
                'noiDungCauHoi' => 'Thủ đô của Việt Nam là gì?',
                'monHocId' => $monLapTrinhC->id,
                'doKhoId' => 1, //tạm
                'imageUrl' => null,
                'giaiThichDapAn' => 'Hà Nội là thủ đô của Việt Nam.',
                'diemMacDinh' => 1.00,
                'nguoiTaoId' => $teacher->id,
                'soLuotSuDung' => 0,
                'status' => 'public',
                'isDeleted' => false,
            ],
            [
                'noiDungCauHoi' => 'Laravel là framework của ngôn ngữ nào?',
                'monHocId' => $monLapTrinhC->id,
                'doKhoId' => 1,
                'imageUrl' => null,
                'giaiThichDapAn' => 'Laravel là framework của PHP.',
                'diemMacDinh' => 1.00,
                'nguoiTaoId' => $teacher->id,
                'soLuotSuDung' => 0,
                'status' => 'public',
                'isDeleted' => false,
            ],
            [
                'noiDungCauHoi' => 'RESTful API sử dụng phương thức HTTP nào để cập nhật dữ liệu?',
                'monHocId' => $monCTDL->id,
                'doKhoId' => 1,
                'imageUrl' => null,
                'giaiThichDapAn' => 'PUT hoặc PATCH dùng để cập nhật dữ liệu.',
                'diemMacDinh' => 1.50,
                'nguoiTaoId' => $teacher->id,
                'soLuotSuDung' => 0,
                'status' => 'public',
                'isDeleted' => false,
            ],
            [
                'noiDungCauHoi' => 'Độ phức tạp của thuật toán tìm kiếm nhị phân là bao nhiêu?',
                'monHocId' => $monCTDL->id,
                'doKhoId' => 1,
                'imageUrl' => null,
                'giaiThichDapAn' => 'O(log n)',
                'diemMacDinh' => 2.00,
                'nguoiTaoId' => $teacher->id,
                'soLuotSuDung' => 0,
                'status' => 'private',
                'isDeleted' => false,
            ],
        ];

        foreach ($cauHois as $cauHoi) {
            CauHoi::firstOrCreate($cauHoi);
        }
    }
}
