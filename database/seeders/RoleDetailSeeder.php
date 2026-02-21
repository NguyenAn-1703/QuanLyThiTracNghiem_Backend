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
    public function run()
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
        RoleDetail::insert($roleDetails);
    }
}
