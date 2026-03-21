<?php

namespace Database\Seeders;

use App\Models\CauHoi;
use App\Models\ChiTietDeThi;
use Illuminate\Database\Seeder;

class ChiTietDeThiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deThiId = 1;

        $cauHois = CauHoi::all(); // sau này có thể lấy ds 1 số câu hỏi

        $thutu = 1;

        foreach ($cauHois as $cauHoi) {
            ChiTietDeThi::updateOrCreate(
                [
                    'cauHoiId' => $cauHoi->id,
                    'deThiId' => $deThiId,
                ],
                [
                    'thutu' => $thutu++,
                    'diem' => $cauHoi->diemMacDinh ?? 1.00,
                ]
            );
        }
    }
}
