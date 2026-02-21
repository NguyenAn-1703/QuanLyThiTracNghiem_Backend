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
            [
                'tenNhomQuyen' => 'student',
            ],
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(
                ['tenNhomQuyen' => $role['tenNhomQuyen']], // điều kiện kiểm tra trùng
                $role
            );
        }
    }
}
