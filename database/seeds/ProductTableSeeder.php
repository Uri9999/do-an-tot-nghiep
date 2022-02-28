<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::truncate();
        // factory(App\Models\Product::class,100)->create();
        for($i = 1; $i <= 20; $i++){
            Product::create([
                'prod_name' => 'Laptop '.$i,
                'prod_slug' => str_slug("Product $i"),
                'prod_price' => mt_rand(1000,9000),
                'prod_img' => "laptop.png",
                'prod_description' => 'Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc.
                Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae.
                Proin lectus ipsum, gravida etds mattis vulputate, tristique ut lectus. Sed et lorem
                nunc'.$i,
                'featured' => mt_rand(0,1),
                'status' => mt_rand(0,1),
                'category_id' => 1
            ]);
        }
        for($i = 1; $i <= 20; $i++){
            Product::create([
                'prod_name' => 'Phone '.$i,
                'prod_slug' => str_slug("Product $i"),
                'prod_price' => mt_rand(1000,9000),
                'prod_img' => "phone.png",
                'prod_description' => 'Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc.
                Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae.
                Proin lectus ipsum, gravida etds mattis vulputate, tristique ut lectus. Sed et lorem
                nunc'.$i,
                'featured' => mt_rand(0,1),
                'status' => mt_rand(0,1),
                'category_id' => 2
            ]);
        }
        for($i = 1; $i <= 20; $i++){
            Product::create([
                'prod_name' => 'Mouse '.$i,
                'prod_slug' => str_slug("Product $i"),
                'prod_price' => mt_rand(1000,9000),
                'prod_img' => "mouse.png",
                'prod_description' => 'Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc.
                Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae.
                Proin lectus ipsum, gravida etds mattis vulputate, tristique ut lectus. Sed et lorem
                nunc'.$i,
                'featured' => mt_rand(0,1),
                'status' => mt_rand(0,1),
                'category_id' => 3
            ]);
        }
        for($i = 1; $i <= 20; $i++){
            Product::create([
                'prod_name' => 'Camera '.$i,
                'prod_slug' => str_slug("Product $i"),
                'prod_price' => mt_rand(1000,9000),
                'prod_img' => "camera.jpg",
                'prod_description' => 'Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc.
                Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae.
                Proin lectus ipsum, gravida etds mattis vulputate, tristique ut lectus. Sed et lorem
                nunc'.$i,
                'featured' => mt_rand(0,1),
                'status' => mt_rand(0,1),
                'category_id' => 4
            ]);
        }
        for($i = 1; $i <= 20; $i++){
            Product::create([
                'prod_name' => 'Keyboard '.$i,
                'prod_slug' => str_slug("Product $i"),
                'prod_price' => mt_rand(1000,9000),
                'prod_img' => "keyboard.png",
                'prod_description' => 'Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc.
                Vestibulum ante ipsum primis in faucibus orci luctus et ultri ces posuere cubilia curae.
                Proin lectus ipsum, gravida etds mattis vulputate, tristique ut lectus. Sed et lorem
                nunc'.$i,
                'featured' => mt_rand(0,1),
                'status' => mt_rand(0,1),
                'category_id' => 5
            ]);
        }
    }
}
