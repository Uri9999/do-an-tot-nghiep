<?php

use Illuminate\Database\Seeder;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::truncate();
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            Coupon::create([
                'coupon_code' => $faker->ean8,
                'coupon_value' => $faker->numberBetween(1, 20) * 5,
                'type' => 1,
                'expired_date' => Carbon::now()->addMonths(1),
                'quantity' => $faker->numberBetween(1, 100)
            ]);
        }
    }
}
