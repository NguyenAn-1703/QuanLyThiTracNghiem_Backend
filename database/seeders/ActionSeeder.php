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
                'tenChucNang' => 'QL_NHOMHP',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'QL_CAUHOI',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'QL_DETHI',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'QL_MONHOC',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'QL_NGUOIDUNG',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'QL_PHANQUYEN',
                'urlIcon' => 'example.icon',
            ],
        ];

        foreach ($actions as $action) {
            Action::firstOrCreate(
                ['tenChucNang' => $action['tenChucNang']],
                $action
            );
        }
    }
}
