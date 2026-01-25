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
        $adminRole = Role::where('name', 'admin')->first();
        $adminActions = Action::all();
        $roleDetails = [];
        $hanhDongs = ["view", "add", "update", "delete"];
        foreach ($adminActions as $adminAction) {
            foreach ($hanhDongs as $hanhDong) {
                $roleDetails[] = [
                    "roleId" => $adminRole->id,
                    "actionId" => $adminAction->id,
                    "hanhdong" => $hanhDong
                ];
            }
        }
        RoleDetail::insert($roleDetails);
    }
}
