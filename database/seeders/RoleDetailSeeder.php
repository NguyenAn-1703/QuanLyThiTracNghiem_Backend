<?php

namespace Database\Seeders;

use App\Models\Action;
use App\Models\Role;
use App\Models\RoleDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() //làm tạm đầy đủ crud
    {
        $adminRole = Role::where('tenNhomQuyen', 'admin')->first();
        $adminActions = Action::all();
        $roleDetails = [];

        $hanhDongs = ["VIEW", "ADD", "UPDATE", "DELETE"];

        foreach ($adminActions as $adminAction) {
            foreach ($hanhDongs as $hanhDong) {
                $roleDetails[] = [
                    "nhomQuyenId" => $adminRole->id,
                    "chucNangId" => $adminAction->id,
                    "hanhDong" => $hanhDong
                ];
            }
        }

        $giangVienRole = Role::where('tenNhomQuyen', 'teacher')->first();
        $giangVienActions = Action::whereIn('tenChucNang', [
            'hoc_phan',
            'cau_hoi',
            'chuong',
            'phan_cong',
            'de_thi',
            'thong_bao'
        ])->get();

        foreach ($giangVienActions as $giangVienAction) {
            foreach ($hanhDongs as $hanhDong) {
                $roleDetails[] = [
                    "nhomQuyenId" => $giangVienRole->id,
                    "chucNangId" => $giangVienAction->id,
                    "hanhDong" => $hanhDong
                ];
            }
        }

        RoleDetail::insertOrIgnore($roleDetails); //ignore hoặc insert dựa vào constraint unique của db
    }
}
