<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'tenNhomQuyen' => 'admin'
            ],
            [
                'tenNhomQuyen' => 'teacher'
            ],
        ];

        Role::upsert(
            $roles,
            ['tenNhomQuyen'], // khóa xác định trùng
            [] // không update gì khi trùng
        );
    }
}
