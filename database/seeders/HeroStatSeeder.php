<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroStat;

class HeroStatSeeder extends Seeder
{
    public function run(): void
    {
        $stats = [
            ['number' => '850', 'suffix' => '+',  'label' => 'Happy Customers', 'sort_order' => 1],
            ['number' => '120', 'suffix' => '+',  'label' => 'Menu Items',      'sort_order' => 2],
            ['number' => '15',  'suffix' => '+',  'label' => 'Expert Chefs',    'sort_order' => 3],
            ['number' => '12',  'suffix' => 'yr', 'label' => 'Experience',      'sort_order' => 4],
        ];

        foreach ($stats as $stat) {
            HeroStat::create($stat);
        }
    }
}