<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'nhat',
            'email' => 'nhat@gmail.com',
            'password' => Hash::make('123123'),
            'role_id' => 1
        ]);
        User::create([
            'name' => 'nhi',
            'email' => 'nhi@gmail.com',
            'password' => Hash::make('123123'),
            'role_id' => 2
        ]);
        User::create([
            'name' => 'tam',
            'email' => 'tam@gmail.com',
            'password' => Hash::make('123123'),
            'role_id' => 2
        ]);
    }
}
