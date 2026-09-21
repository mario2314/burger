<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeSlot;

class TimeSlotSeeder extends Seeder
{
    public function run(): void
    {
        $slots = [
            '09:00 AM', '10:00 AM', '11:00 AM', '12:00 PM',
            '01:00 PM', '02:00 PM', '06:00 PM', '07:00 PM',
            '08:00 PM', '09:00 PM', '10:00 PM',
        ];

        foreach ($slots as $index => $label) {
            TimeSlot::create(['label' => $label, 'sort_order' => $index + 1]);
        }
    }
}