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
                'fullname' => 'Admin',
                'email' => 'admin',
                'passwordHash' => '',
                'roleId' => 1,
                'phoneNumber' => "0999999999",
                'status' => 'active',
                'groupId' => 1,
                'lastLogin' => now(),
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
