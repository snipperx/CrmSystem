<?php

use App\HRPerson;
use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $user =  User::create([
            'name' => 'Nkosana',
            'email' => 'nkosana@test.com',
            'password' => bcrypt('password'),
        ]);

        HRPerson::create([
            'user_id' => $user['id'],
            'first_name' =>  'nkosana',
            'surname' =>  'Ncube',
            'status' =>  1,
            'email' => $user['email'],
        ]);

    }
}
