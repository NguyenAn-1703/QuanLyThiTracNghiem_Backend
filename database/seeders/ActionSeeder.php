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
                'tenChucNang' => 'users',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'mon_hocs',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'chua',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'chua1',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'chua2',
                'urlIcon' => 'example.icon',
            ],
            [
                'tenChucNang' => 'chua3',
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
