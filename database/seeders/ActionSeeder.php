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
            ['name' => 'Chức năng 1'],
            ['name' => 'Chức năng 2'],
            ['name' => 'Chức năng 3'],
        ];

        foreach ($actions as $action){
            Action::firstOrCreate(
                ['name' => $action['name']],
                $action
            );
        }
        
    }
}
