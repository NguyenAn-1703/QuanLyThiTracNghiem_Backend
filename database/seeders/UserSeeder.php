<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $adminRole = Role::where('tenNhomQuyen', 'admin')->first();
        $teacherRole = Role::where('tenNhomQuyen','teacher')->first();
        $studentRole = Role::where('tenNhomQuyen', 'student')->first();
        $users = [
            [
                'hoTen' => 'Admin',
                'email' => 'admin',
                'password' => 'admin',
                'nhomQuyenId' => $adminRole->id,
                'sdt' => "0999999999",
                'username' => 'Admin',
                'ngaySinh' => now(),
                'laGioiTinhNu' => true,
                'ggid' => 'idexample',
                'urlAvatar' => 'example.icon',
                'isStudent' => false,
            ],
            [
                'hoTen' => 'Ân Giảng Viên',
                'email' => 'gianvien@gmail.com',
                'password' => '123456',
                'nhomQuyenId' => $teacherRole->id,
                'sdt' => "0988888889",
                'username' => 'giangvien',
                'ngaySinh' => '2004-05-10',
                'laGioiTinhNu' => false,
                'ggid' => null,
                'urlAvatar' => null,
                'isStudent' => false,
            ],
            [
                'hoTen' => 'Nguyễn Ngọc Thiên Ân',
                'email' => 'sinhvien@gmail.com',
                'password' => '123456',
                'nhomQuyenId' => $studentRole->id,
                'sdt' => "0988888888",
                'username' => 'sinhvien',
                'ngaySinh' => '2004-05-10',
                'laGioiTinhNu' => false,
                'ggid' => null,
                'urlAvatar' => null,
                'isStudent' => true,
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']], // điều kiện kiểm tra trùng
                $user
            );
        }
    }
}
