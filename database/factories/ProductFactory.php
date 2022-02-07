<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'prod_name' => $faker->word,
        'prod_slug' => $faker->word,
        'prod_price' => $faker->numberBetween(1000, 9000),
        'prod_description' => $faker->paragraph,
        'category_id' => $faker->numberBetween(1,5), 
        'featured' => $faker->numberBetween(1,0),
        'status' => $faker->numberBetween(1,0),
        'prod_img' => $faker->imageUrl(225, 280, 'cats', true, 'Faker', true),
    ];
});
