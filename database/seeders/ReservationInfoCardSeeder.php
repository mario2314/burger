<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ReservationInfoCard;

class ReservationInfoCardSeeder extends Seeder
{
    public function run(): void
    {
        $cards = [
            ['icon' => 'fa-clock',          'label' => 'Opening Hours',  'value' => 'Wed - Sun, 9 AM - 11 PM',       'sort_order' => 1],
            ['icon' => 'fa-phone-alt',      'label' => 'Call for Booking','value' => '+1 (800) 123-4567',            'sort_order' => 2],
            ['icon' => 'fa-users',          'label' => 'Group Dining',   'value' => 'Special menus for 10+ guests',  'sort_order' => 3],
            ['icon' => 'fa-map-marker-alt', 'label' => 'Location',       'value' => '42 Flavor Street, NY',          'sort_order' => 4],
        ];

        foreach ($cards as $card) {
            ReservationInfoCard::create($card);
        }
    }
}