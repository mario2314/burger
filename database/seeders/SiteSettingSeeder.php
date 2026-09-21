<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_name'        => 'Sarab',
            'site_tagline'     => 'Fast Food & Restaurant',
            'phone'            => '+1 (800) 123-4567',
            'email'            => 'hello@sarabfood.com',
            'address_short'    => '42 Flavor Street, NY',
            'address_full'     => '42 Flavor Street, Manhattan, New York, NY 10001',
            'hours_display'    => 'Wed - Sun: 09 AM - 11 PM',
            'facebook_url'     => '#',
            'instagram_url'    => '#',
            'twitter_url'      => '#',
            'youtube_url'      => '#',
            'tiktok_url'       => '#',
            'about_label'      => 'Our Story',
            'about_title'      => 'We Invite You to Visit Our Food Restaurant',
            'about_description'=> "Founded in 2012, Sarab began as a small corner joint with a big dream - to serve food that brings people together.",
            'about_badge_number' => '12+',
            'about_badge_label'  => 'Years of Excellence',
            'about_image_main'   => 'about1.jpg',
            'about_image_small'  => 'about2.jpg',
            'about_cta_label'    => 'View Full Menu',
            'footer_description' => "We bring the world's finest flavors together in a fast, friendly, and affordable experience. Every meal crafted with love.",
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}