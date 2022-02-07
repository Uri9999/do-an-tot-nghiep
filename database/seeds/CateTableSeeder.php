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
        //
        Category::create([
            'cate_name' => 'Áo Khoác',
            'cate_slug' => str_slug('Áo Khoác')
        ]);
        Category::create([
            'cate_name' => 'Áo Thun',
            'cate_slug' => str_slug('Áo Khoác')
        ]);
        Category::create([
            'cate_name' => 'Áo Sơ Mi',
            'cate_slug' => str_slug('Áo Khoác')
        ]);
        Category::create([
            'cate_name' => 'Áo Bà Ba',
            'cate_slug' => str_slug('Áo Khoác')
        ]);
        Category::create([
            'cate_name' => 'Áo Tứ Thân',
            'cate_slug' => str_slug('Áo Khoác')
        ]);


    }
}
