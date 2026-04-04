<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actions = [
            [
                'tenChucNang' => 'nguoi_dung',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'do_kho',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'hoc_phan',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'cau_hoi',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'mon_hoc',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'chuong',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'phan_cong',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'de_thi',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'nhom_quyen',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'thong_bao',
                'urlIcon' => 'example.icon',
            ],
        ];

        Action::upsert($actions, ['tenChucNang']);
    }
}
