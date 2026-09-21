<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Chef;

class ChefSeeder extends Seeder
{
    public function run(): void
    {
        $chefs = [
            ['name' => 'Budi Santoso',  'role' => 'Executive Chef',  'experience' => 15, 'image' => '1.jpg', 'instagram' => '#', 'facebook' => '#', 'twitter' => '#'],
            ['name' => 'Michael Tan',   'role' => 'Grill Master',    'experience' => 8,  'image' => '2.jpg', 'instagram' => '#', 'facebook' => '#', 'twitter' => '#'],
            ['name' => 'Faz Chowdel',   'role' => 'Pastry Chef',     'experience' => 10, 'image' => '3.jpg', 'instagram' => '#', 'facebook' => '#', 'twitter' => '#'],
            ['name' => 'William Latnum','role' => 'Pizza Artisan',   'experience' => 9,  'image' => '4.jpg', 'instagram' => '#', 'facebook' => '#', 'twitter' => '#'],
        ];

        foreach ($chefs as $chef) {
            Chef::create($chef);
        }
    }
}