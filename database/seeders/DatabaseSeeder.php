<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            MenuItemSeeder::class,
            ChefSeeder::class,
            TestimonialSeeder::class,
            BlogPostSeeder::class,
            SiteSettingSeeder::class,
            SiteSettingExtraSeeder::class,
            BusinessHourSeeder::class,
            HistoryTimelineSeeder::class,
            NavItemSeeder::class,
            AdminUserSeeder::class,
            FeatureSeeder::class,
            GalleryItemSeeder::class,
            GuestOptionSeeder::class,
            TimeSlotSeeder::class,
            ContactSubjectSeeder::class,
            ReservationInfoCardSeeder::class,
            HeroStatSeeder::class,
            HeroBadgeSeeder::class,
            MarqueeItemSeeder::class,
            TrendingTagSeeder::class,
        ]);
    }
}