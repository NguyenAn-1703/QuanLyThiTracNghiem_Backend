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
        $teacherRole = Role::where('tenNhomQuyen', 'teacher')->first();
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
                'nhomQuyenId' => null,
                'sdt' => "0988888888",
                'username' => 'sinhvien',
                'ngaySinh' => '2004-05-10',
                'laGioiTinhNu' => false,
                'ggid' => null,
                'urlAvatar' => null,
                'isStudent' => true,
            ],

            [
                'hoTen' => 'Nguyễn Văn Hùng',
                'email' => 'hung.nguyen@university.edu.vn',
                'password' => '123456',
                'nhomQuyenId' => $teacherRole->id,
                'sdt' => '0901000001',
                'username' => '8392017465',
                'ngaySinh' => '1982-03-12',
                'laGioiTinhNu' => false,
                'ggid' => null,
                'urlAvatar' => null,
                'isStudent' => false,
            ],
            [
                'hoTen' => 'Trần Thị Mai',
                'email' => 'mai.tran@university.edu.vn',
                'password' => '123456',
                'nhomQuyenId' => $teacherRole->id,
                'sdt' => '0901000002',
                'username' => '4729105836',
                'ngaySinh' => '1987-07-25',
                'laGioiTinhNu' => true,
                'ggid' => null,
                'urlAvatar' => null,
                'isStudent' => false,
            ],
            [
                'hoTen' => 'Lê Minh Tuấn',
                'email' => 'tuan.le@university.edu.vn',
                'password' => '123456',
                'nhomQuyenId' => $teacherRole->id,
                'sdt' => '0901000003',
                'username' => '6152849371',
                'ngaySinh' => '1985-11-09',
                'laGioiTinhNu' => false,
                'ggid' => null,
                'urlAvatar' => null,
                'isStudent' => false,
            ],
            [
                'hoTen' => 'Phạm Thị Hồng',
                'email' => 'hong.pham@university.edu.vn',
                'password' => '123456',
                'nhomQuyenId' => $teacherRole->id,
                'sdt' => '0901000004',
                'username' => '9021746385',
                'ngaySinh' => '1990-01-18',
                'laGioiTinhNu' => true,
                'ggid' => null,
                'urlAvatar' => null,
                'isStudent' => false,
            ],
            [
                'hoTen' => 'Hoàng Quốc Bảo',
                'email' => 'bao.hoang@university.edu.vn',
                'password' => '123456',
                'nhomQuyenId' => $teacherRole->id,
                'sdt' => '0901000005',
                'username' => '7483951026',
                'ngaySinh' => '1983-06-30',
                'laGioiTinhNu' => false,
                'ggid' => null,
                'urlAvatar' => null,
                'isStudent' => false,
            ],
            [
                'hoTen' => 'Võ Thị Thu Hà',
                'email' => 'ha.vo@university.edu.vn',
                'password' => '123456',
                'nhomQuyenId' => $teacherRole->id,
                'sdt' => '0901000006',
                'username' => '5839201746',
                'ngaySinh' => '1988-09-14',
                'laGioiTinhNu' => true,
                'ggid' => null,
                'urlAvatar' => null,
                'isStudent' => false,
            ],
            [
                'hoTen' => 'Đặng Anh Dũng',
                'email' => 'dung.dang@university.edu.vn',
                'password' => '123456',
                'nhomQuyenId' => $teacherRole->id,
                'sdt' => '0901000007',
                'username' => '3194758206',
                'ngaySinh' => '1981-12-05',
                'laGioiTinhNu' => false,
                'ggid' => null,
                'urlAvatar' => null,
                'isStudent' => false,
            ],


            ['hoTen' => 'Nguyễn Văn An', 'email' => 'nguyenvanan01@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000001', 'username' => '3123560101', 'ngaySinh' => '2005-01-12', 'laGioiTinhNu' => false, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Trần Thị Bích', 'email' => 'tranbich02@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000002', 'username' => '3123560102', 'ngaySinh' => '2005-02-20', 'laGioiTinhNu' => true, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Lê Minh Cường', 'email' => 'lecuong03@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000003', 'username' => '3123560103', 'ngaySinh' => '2005-03-05', 'laGioiTinhNu' => false, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Phạm Thị Duyên', 'email' => 'phamduyen04@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000004', 'username' => '3123560104', 'ngaySinh' => '2005-04-18', 'laGioiTinhNu' => true, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Hoàng Gia Huy', 'email' => 'hoanghuy05@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000005', 'username' => '3123560105', 'ngaySinh' => '2005-05-09', 'laGioiTinhNu' => false, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Võ Thị Hạnh', 'email' => 'vohanh06@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000006', 'username' => '3123560106', 'ngaySinh' => '2005-06-22', 'laGioiTinhNu' => true, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Đặng Minh Hoàng', 'email' => 'danghoang07@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000007', 'username' => '3123560107', 'ngaySinh' => '2005-07-14', 'laGioiTinhNu' => false, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Bùi Thị Lan', 'email' => 'builan08@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000008', 'username' => '3123560108', 'ngaySinh' => '2005-08-03', 'laGioiTinhNu' => true, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Ngô Quang Minh', 'email' => 'ngominh09@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000009', 'username' => '3123560109', 'ngaySinh' => '2005-09-27', 'laGioiTinhNu' => false, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Phan Thị Ngọc', 'email' => 'phanngoc10@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000010', 'username' => '3123560110', 'ngaySinh' => '2005-10-11', 'laGioiTinhNu' => true, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],

            ['hoTen' => 'Trịnh Công Phúc', 'email' => 'phuc11@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000011', 'username' => '3123560111', 'ngaySinh' => '2005-11-02', 'laGioiTinhNu' => false, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Mai Thị Quỳnh', 'email' => 'quynh12@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000012', 'username' => '3123560112', 'ngaySinh' => '2005-12-19', 'laGioiTinhNu' => true, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Đỗ Anh Tuấn', 'email' => 'tuan13@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000013', 'username' => '3123560113', 'ngaySinh' => '2005-01-25', 'laGioiTinhNu' => false, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Lý Thị Uyên', 'email' => 'uyen14@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000014', 'username' => '3123560114', 'ngaySinh' => '2005-02-08', 'laGioiTinhNu' => true, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Hồ Minh Vũ', 'email' => 'vu15@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000015', 'username' => '3123560115', 'ngaySinh' => '2005-03-30', 'laGioiTinhNu' => false, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Nguyễn Thị Yến', 'email' => 'yen16@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000016', 'username' => '3123560116', 'ngaySinh' => '2005-04-07', 'laGioiTinhNu' => true, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Trần Quốc Bảo', 'email' => 'bao17@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000017', 'username' => '3123560117', 'ngaySinh' => '2005-05-16', 'laGioiTinhNu' => false, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Phạm Thị Chi', 'email' => 'chi18@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000018', 'username' => '3123560118', 'ngaySinh' => '2005-06-28', 'laGioiTinhNu' => true, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Lê Văn Dũng', 'email' => 'dung19@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000019', 'username' => '3123560119', 'ngaySinh' => '2005-07-21', 'laGioiTinhNu' => false, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],
            ['hoTen' => 'Nguyễn Thị Hương', 'email' => 'huong20@gmail.com', 'password' => '123456', 'nhomQuyenId' => null, 'sdt' => '0977000020', 'username' => '3123560120', 'ngaySinh' => '2005-08-13', 'laGioiTinhNu' => true, 'ggid' => null, 'urlAvatar' => null, 'isStudent' => true],

        ];

        foreach ($users as $user) {
            User::firstOrCreate(
                ['email' => $user['email']], // điều kiện kiểm tra trùng
                $user
            );
        }
    }
}
