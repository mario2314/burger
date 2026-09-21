<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrendingTag;

class TrendingTagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            'Smash Burger',
            'Nashville Chicken',
            'Truffle Pizza',
            'Lava Cake',
            'Loaded Fries',
            'Mango Shake',
        ];

        foreach ($tags as $index => $label) {
            TrendingTag::create(['label' => $label, 'sort_order' => $index + 1]);
        }
    }
}