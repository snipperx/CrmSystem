<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ModulesTableSeeder::class);
         $this->call(ModuleRibbonTableSeeder::class);
         $this->call(ModuleAccessTableSeeder::class);

    }
}
