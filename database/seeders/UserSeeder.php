<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'hoTen' => 'Admin',
                'email' => 'admin',
                'password' => '',
                'nhomQuyenId' => 1,
                'sdt' => "0999999999",
                'username' => 'Admin',
                'ngaySinh' => now(),
                'laGioiTinhNu' => true,
                'ggid' => 'idexample',
                'urlAvatar' => 'example.icon',
                'isStudent' => false,
            ]
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']], // điều kiện kiểm tra trùng
                $user
            );
        }
    }
}
