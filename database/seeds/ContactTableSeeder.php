<?php

use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contact::truncate();
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            Contact::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'message' => $faker->realText(200),
            ]);
        }
    }
}
