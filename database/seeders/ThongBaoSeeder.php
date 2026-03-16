<?php

namespace Database\Seeders;

use App\Models\ThongBao;
use App\Models\User;
use Illuminate\Database\Seeder;

class ThongBaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $giangvien = User::where("username","giangvien")->first();
        
        $thongBaos = [
            [
                'tieuDe' => 'Thông báo khai giảng học kỳ mới',
                'noiDung' => 'Sinh viên vui lòng kiểm tra thời khóa biểu và tham gia học đúng thời gian quy định.',
                'nguoiGuiId' => $giangvien->id,
                'thoiGianGui' => now(),
                'uuTien' => 2,
                'status' => true
            ],
            [
                'tieuDe' => 'Thông báo lịch thi giữa kỳ',
                'noiDung' => 'Lịch thi giữa kỳ đã được cập nhật trên hệ thống. Sinh viên kiểm tra để tham gia đúng giờ.',
                'nguoiGuiId' => $giangvien->id,
                'thoiGianGui' => now(),
                'uuTien' => 3,
                'status' => true
            ],
        ];

        foreach ($thongBaos as $thongBao) {
            ThongBao::firstOrCreate(
                ['tieuDe' => $thongBao['tieuDe']],
                $thongBao
            );
        }
    }
}
