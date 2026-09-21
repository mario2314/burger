<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Burgers',       'slug' => 'burgers',  'image' => '2.jpg'],
            ['name' => 'Pizza',         'slug' => 'pizza',    'image' => '3.jpg'],
            ['name' => 'Fried Chicken', 'slug' => 'chicken',  'image' => '4.jpg'],
            ['name' => 'Wraps',         'slug' => 'wraps',    'image' => '5.jpg'],
            ['name' => 'Desserts',      'slug' => 'desserts', 'image' => '6.jpg'],
            ['name' => 'Pasta',         'slug' => 'pasta',    'image' => '1.jpg'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}