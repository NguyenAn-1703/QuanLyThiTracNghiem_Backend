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
        $chiTietDeThis = [];

        $chiTietDeThis = [];

        // đề 1 (id = 1, môn 1)
        $thuTu = 1;
        for ($i = 1; $i <= 10; $i++) {
            $chiTietDeThis[] = [
                'cauHoiId' => $i,
                'deThiId' => 1,
                'thuTu' => $thuTu++,
            ];
        }

        // đề 2 (id = 2, môn 1)
        $thuTu = 1;
        for ($i = 11; $i <= 20; $i++) {
            $chiTietDeThis[] = [
                'cauHoiId' => $i,
                'deThiId' => 2,
                'thuTu' => $thuTu++,
            ];
        }

        // đề 3 (id = 3, môn 2)
        $thuTu = 1;
        for ($i = 26; $i <= 35; $i++) {
            $chiTietDeThis[] = [
                'cauHoiId' => $i,
                'deThiId' => 3,
                'thuTu' => $thuTu++,
            ];
        }

        // đề 4 (id = 4, môn 2)
        $thuTu = 1;
        for ($i = 36; $i <= 45; $i++) {
            $chiTietDeThis[] = [
                'cauHoiId' => $i,
                'deThiId' => 4,
                'thuTu' => $thuTu++,
            ];
        }

        ChiTietDeThi::insert($chiTietDeThis);
    }
}
