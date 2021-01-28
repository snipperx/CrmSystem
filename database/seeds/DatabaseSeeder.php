<?php


use Illuminate\Database\Seeder;
use App\HRPerson;
use App\ModuleRibbon;
use App\Module_access;
use App\Module;
use App\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //insert default user
        $user = new User;
        $user->name = 'Nkosana';
        $user->email = 'nkosana@test.com';
        $user->isAdmin = 1;
        $user->password = Hash::make('password');
        $user->save();

        //insert default user's hr record
        $person = new HRPerson();
        $person->first_name = 'Nkosana';
        $person->surname = 'Ncube';
        $person->email = 'nkosana@test.com';
        $person->status = 1;
        $person->employee_number = '00' . rand(1, 100);
        $user->addPerson($person);

        $module = new Module(); //polivy
        $module->active = 1;
        $module->name = 'Users';
        $module->path = 'users';
        $module->font_awesome = 'fa fa-users';
        $module->save();


        $mod_access = new Module_access();
        $mod_access->user_id = $user['id'];
        $mod_access->active = 1;
        $mod_access->access_level = 3;
        $module->addModuleAccess($mod_access);


        $ribbon = new ModuleRibbon();
        $ribbon->active = 1;
        $ribbon->sort_order = 1;
        $ribbon->ribbon_name = 'Users';
        $ribbon->description = 'Users module';
        $ribbon->ribbon_path = 'users';
        $ribbon->access_level = 3;
        $module->addRibbon($ribbon);


        $module = new Module(); //
        $module->active = 1;
        $module->name = 'General Settings';
        $module->path = 'general_settings';
        $module->font_awesome = 'fa fa-cogs';
        $module->save();


        $mod_access = new Module_access();
        $mod_access->user_id = $user['id'];
        $mod_access->active = 1;
        $mod_access->access_level = 3;
        $module->addModuleAccess($mod_access);


        $ribbon = new ModuleRibbon();
        $ribbon->active = 1;
        $ribbon->sort_order = 1;
        $ribbon->ribbon_name = 'Setup';
        $ribbon->description = 'Setup';
        $ribbon->ribbon_path = 'setup';
        $ribbon->access_level = 3;
        $module->addRibbon($ribbon);

        $ribbon = new ModuleRibbon();
        $ribbon->active = 1;
        $ribbon->sort_order = 2;
        $ribbon->ribbon_name = 'Company Settings';
        $ribbon->description = 'Company Settings module';
        $ribbon->ribbon_path = 'company_settings';
        $ribbon->access_level = 5;
        $module->addRibbon($ribbon);

        $ribbon = new ModuleRibbon();
        $ribbon->active = 1;
        $ribbon->sort_order = 2;
        $ribbon->ribbon_name = 'Modules';
        $ribbon->description = 'Modules  module';
        $ribbon->ribbon_path = 'modules';
        $ribbon->access_level = 5;
        $module->addRibbon($ribbon);

    }
}
