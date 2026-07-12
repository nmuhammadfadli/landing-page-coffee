<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProductSeeder::class,
            ArticleSeeder::class,
            TestimonialSeeder::class,
            FAQSeeder::class,
            TimelineStepSeeder::class,
            GalleryPhotoSeeder::class,
            BrewGuideSeeder::class,
            SettingSeeder::class,
        ]);
    }
}
