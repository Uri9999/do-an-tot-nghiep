<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(CateTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ContactTableSeeder::class);
        $this->call(CouponTableSeeder::class);
        
    }
    
}
