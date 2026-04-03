<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoKhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doKhos = [
            ['tenDoKho' => 'Nhận biết'],
            ['tenDoKho' => 'Thông hiểu'],
            ['tenDoKho' => 'Vận dụng'],
            ['tenDoKho' => 'Vận dụng cao'],
        ];

        \App\Models\DoKho::upsert(
            $doKhos,
            ['tenDoKho'], // khóa xác định trùng (ví dụ: "Dễ", "Trung bình", "Khó")
            [] // không update gì khi trùng
        );
    }
}
