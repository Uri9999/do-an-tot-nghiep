<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        Category::create([
            'cate_name' => 'Laptop',
            'cate_slug' => str_slug('Computer')
        ]);
        Category::create([
            'cate_name' => 'Phone',
            'cate_slug' => str_slug('Phone')
        ]);
        Category::create([
            'cate_name' => 'Mouse',
            'cate_slug' => str_slug('Laptop')
        ]);
        Category::create([
            'cate_name' => 'Camera',
            'cate_slug' => str_slug('Camera')
        ]);
        Category::create([
            'cate_name' => 'Keyboard',
            'cate_slug' => str_slug('Keyboard')
        ]);


    }
}
