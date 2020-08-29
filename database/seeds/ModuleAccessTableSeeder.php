<?php

use Illuminate\Database\Seeder;
use App\Module_access;

class ModuleAccessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Module_access::create([
            'module_id'=> 1,
            'user_id' => 1,
            'active' => 1,
            'access_level' => 5
        ]);
        Module_access::create([
            'module_id'=> 2,
            'user_id' => 1,
            'active' => 1,
            'access_level' => 5
        ]);

        Module_access::create([
            'module_id'=> 3,
            'user_id' => 1,
            'active' => 1,
            'access_level' => 5
        ]);
    }
}
