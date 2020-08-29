<?php

use Illuminate\Database\Seeder;
use App\Module;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Module::create([
            'name' => 'Settings',
            'path' => 'settings',
            'active' => 1,
            'font_awesome' => 'fa fa-cogs',
        ]);

        Module::create([
            'name' => 'Users',
            'path' => 'users',
            'active' => 1,
            'font_awesome' => 'fa fa-users',
        ]);
    }
}
