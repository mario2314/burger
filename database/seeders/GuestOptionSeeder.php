<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GuestOption;

class GuestOptionSeeder extends Seeder
{
    public function run(): void
    {
        $options = [
            ['label' => '1 Person',      'value' => 1,  'sort_order' => 1],
            ['label' => '2 People',      'value' => 2,  'sort_order' => 2],
            ['label' => '3 - 4 People',  'value' => 3,  'sort_order' => 3],
            ['label' => '5 - 6 People',  'value' => 5,  'sort_order' => 4],
            ['label' => '7 - 10 People', 'value' => 7,  'sort_order' => 5],
            ['label' => '10+ People',    'value' => 10, 'sort_order' => 6],
        ];

        foreach ($options as $option) {
            GuestOption::create($option);
        }
    }
}