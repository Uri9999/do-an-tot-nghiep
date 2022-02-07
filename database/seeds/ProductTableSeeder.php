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
        factory(App\Models\Product::class,100)->create();
        // for($i = 1; $i <= 100; $i++){
        //     Product::create([
        //         'prod_name' => 'Product '.$i,
        //         'prod_slug' => str_slug("Product $i"),
        //         'prod_price' => mt_rand(1000,9000),
        //         'prod_img' => "img $i",
        //         'prod_description' => 'Chi Tiết '.$i,
        //         'featured' => mt_rand(0,1),
        //         'status' => mt_rand(0,1),
        //         'category_id' => mt_rand(1,5)
        //     ]);
        // }
    }
}
