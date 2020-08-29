<?php

use Illuminate\Database\Seeder;
use App\ModuleRibbon;

class ModuleRibbonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModuleRibbon::create([
            'module_id'  => 1,
            'sort_order'  => 1,
            'ribbon_name '  => 'Setup',
            'ribbon_path'  => 'setup',
            'description'  => 'setup',
            'access_level'  => 5,
            'active'  => 1,
        ]);

        ModuleRibbon::create([
            'module_id'  => 2,
            'sort_order'  => 1,
            'ribbon_name '  => 'Users',
            'ribbon_path'  => 'sers',
            'description'  => 'user module',
            'access_level'  => 5,
            'active'  => 1,
        ]);

        ModuleRibbon::create([
            'module_id'  => 1,
            'sort_order'  => 2,
            'ribbon_name '  => 'Contacts',
            'ribbon_path'  => 'contacts',
            'description'  => 'contact ',
            'access_level'  => 5,
            'active'  => 1,
        ]);

        ModuleRibbon::create([
            'module_id'  => 1,
            'sort_order'  => 1,
            'ribbon_name '  => 'Modules',
            'ribbon_path'  => 'modules',
            'description'  => 'modules ',
            'access_level'  => 5,
            'active'  => 1,
        ]);
    }
}
