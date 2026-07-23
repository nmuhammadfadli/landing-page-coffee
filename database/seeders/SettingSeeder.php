<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'whatsapp_phone', 'value' => '6281230860124'],
            ['key' => 'company_name', 'value' => 'Nayaka Export Atelier'],
            ['key' => 'company_tagline_id', 'value' => 'Kopi Spesialti Indonesia — Ekspor B2B Direct-Trade'],
            ['key' => 'company_tagline_en', 'value' => 'Indonesian Specialty Coffee — B2B Direct-Trade Export'],
            ['key' => 'email_hello', 'value' => 'hello@nayakaexport.com'],
            ['key' => 'instagram', 'value' => 'nayakaexport'],
            // ['key' => 'linkedin', 'value' => 'nayaka-export-atelier'],
            ['key' => 'hero_line1_id', 'value' => 'Kopi Nusantara Spesialti Murni,'],
            ['key' => 'hero_line1_en', 'value' => 'Indonesian Specialty Coffee,'],
            ['key' => 'hero_line2_id', 'value' => 'Siap Ekspor ke Seluruh Dunia.'],
            ['key' => 'hero_line2_en', 'value' => 'Ready to Export to the World.'],
            ['key' => 'brand_name', 'value' => 'Nayaka'],
            ['key' => 'brand_subtitle', 'value' => 'Export Atelier'],
        ];

        foreach ($settings as $data) {
            Setting::updateOrCreate(['key' => $data['key']], $data);
        }
    }
}
