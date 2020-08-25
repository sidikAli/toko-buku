<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'name' => "Biografi"
            'slug' => "biografi"
        ],
        [
            'name' => "Novel"
            'slug' => "novel"
        ],
        [
            'name' => "Agama"
            'slug' => "agama"
        ];


    	foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
