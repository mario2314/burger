<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessHour;

class BusinessHourSeeder extends Seeder
{
    public function run(): void
    {
        $hours = [
            ['day_label' => 'Monday - Tuesday',     'open_time' => null,       'close_time' => null,       'is_closed' => true,  'sort_order' => 1],
            ['day_label' => 'Wednesday - Thursday', 'open_time' => '09:00:00', 'close_time' => '22:00:00', 'is_closed' => false, 'sort_order' => 2],
            ['day_label' => 'Friday',               'open_time' => '09:00:00', 'close_time' => '23:00:00', 'is_closed' => false, 'sort_order' => 3],
            ['day_label' => 'Saturday',             'open_time' => '10:00:00', 'close_time' => '23:30:00', 'is_closed' => false, 'sort_order' => 4],
            ['day_label' => 'Sunday',               'open_time' => '11:00:00', 'close_time' => '21:00:00', 'is_closed' => false, 'sort_order' => 5],
        ];

        foreach ($hours as $hour) {
            BusinessHour::create($hour);
        }
    }
}