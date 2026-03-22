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
            ['tenDoKho' => 'Dễ'],
            ['tenDoKho' => 'Trung bình'],
            ['tenDoKho' => 'Khó'],
            ['tenDoKho' => 'Rất khó'],
        ];

        foreach ($doKhos as $doKho) {
            \App\Models\DoKho::create($doKho);
        }
    }
}
