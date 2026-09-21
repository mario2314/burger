<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingExtraSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'topbar_delivery_tag'       => 'Free Delivery Today!',
            'hero_badge_text'           => '#1 Rated Fast Food Restaurant in New York',
            'hero_title'                => 'Delicious <span class="hl">Fast Food</span><br/>for Every Moment',
            'hero_description'          => 'Experience bold flavors crafted from premium ingredients. From crispy burgers to gourmet pizzas - every bite is an adventure worth savoring.',
            'hero_video_url'            => 'https://www.youtube.com/watch?v=RXv_uIN6e-Y',
            'hero_video_label'          => 'Watch Our Story',
            'hero_cta_label'            => 'Explore Menu',
            'hero_image'                => 'banner-img.jpg',
            'category_label'            => 'What We Offer',
            'category_title'            => 'Browse by <span>Category</span>',
            'category_subtitle'         => 'From sizzling burgers to exotic world cuisines - find your favourite in our menu',
            'category_all_label'        => 'All Items',
            'category_all_image'        => '1.jpg',
            'menu_label'                => "What's Cooking",
            'menu_title'                => 'Our Delicious <span>Menu</span>',
            'menu_subtitle'             => '',
            'gallery_label'             => 'Food Showcase',
            'gallery_title'             => "Let's See Our <span>Fast Food</span>",
            'history_label'             => 'Our Journey',
            'history_title'             => 'A History of <span>Restaurant</span>',
            'history_subtitle'          => "From humble beginnings to the city's most beloved restaurant - every chapter written with passion.",
            'chefs_label'               => 'The Culinary Team',
            'chefs_title'               => 'Meet Our Expert <span>Chefs</span>',
            'hours_label'               => 'Opening Hours',
            'hours_title'               => "We're Open <span>For You</span>",
            'hours_cta_title'           => 'Order Online',
            'hours_cta_desc'            => 'Get hot food delivered in 25 minutes',
            'hours_cta_button'          => 'Order Now',
            'hours_findus_label'        => 'Find Us',
            'testimonials_label'        => 'What People Say',
            'testimonials_title'        => 'Our Customers <span>Feedback</span>',
            'reservation_label'         => 'Book a Table',
            'reservation_title'         => 'Make a <span>Reservation</span>',
            'reservation_subtitle'      => 'Reserve your table for a memorable dining experience.',
            'reservation_contact_title' => 'Contact Info',
            'reservation_contact_desc'  => "We're happy to help you plan the perfect dining experience.",
            'reservation_success_msg'   => "Table reserved! We'll confirm via email shortly.",
            'blog_label'                => 'News & Updates',
            'blog_title'                => 'Our Latest <span>Blog</span> Posts',
            'blog_subtitle'             => '',
            'newsletter_label'          => 'Stay Connected',
            'newsletter_title'          => 'Subscribe &amp; Get Exclusive <span>Deals</span>',
            'newsletter_description'    => 'Get 15% off your first order plus early access to new menu items',
            'newsletter_footer_note'    => 'No spam, unsubscribe anytime.',
            'contact_label'             => 'Get In Touch',
            'contact_title'             => 'Contact <span>Us</span>',
            'contact_subtitle'          => "Have a question, feedback, or want to plan a special event? We'd love to hear from you.",
            'contact_talk_title'        => "Let's Talk",
            'contact_talk_desc'         => 'We typically respond within 2 hours during business hours.',
            'contact_success_msg'       => "Message sent! We'll reply within 2 hours.",
            'search_title'              => 'What are you craving today?',
            'search_trending_label'     => 'Trending Searches',
            'special_tag'               => 'Limited Time Offer',
            'special_title'             => 'Get 30% Off<br/>Our Signature<br/><span>Burger</span> Meal',
            'special_description'       => "Don't miss our weekend special - grab our award-winning signature burger combo with loaded fries and a premium shake at an unbeatable price.",
            'special_cta_label'         => 'Grab the Deal',
            'special_old_price'         => '24.99',
            'special_new_price'         => '17.49',
            'special_image'             => 'off-img.jpg',
            'special_countdown_hours'   => '08',
            'special_countdown_minutes' => '45',
            'special_countdown_seconds' => '30',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}