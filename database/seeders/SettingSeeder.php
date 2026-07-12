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
            ['key' => 'linkedin', 'value' => 'nayaka-export-atelier'],
        ];

        foreach ($settings as $data) {
            Setting::create($data);
        }
    }
}
