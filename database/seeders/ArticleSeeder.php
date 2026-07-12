<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            [
                'slug' => 'precision-in-hermetic-packaging',
                'title_id' => 'Presisi dalam Kemasan Hermetis: Mencegah Kerusakan Kopi Selama Transit Samudra',
                'title_en' => 'Precision in Hermetic Packaging: Preventing Coffee Damage During Ocean Transit',
                'category_id' => 'Sains Logistik',
                'category_en' => 'Logistics Science',
                'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=400',
                'date_published' => '2026-06-28',
                'read_time_id' => '6 Menit Baca',
                'read_time_en' => '6 Min Read',
                'summary_id' => 'Menganalisis bagaimana fluktuasi kelembapan udara relatif di dalam kontainer pengapalan laut memengaruhi aktivitas air biji hijau, dan bagaimana segel GrainPro mempertahankan kesegaran sensorik.',
                'summary_en' => 'Analyzing how relative humidity fluctuations inside ocean shipping containers affect green coffee water activity, and how GrainPro seals preserve sensory freshness.',
            ],
            [
                'slug' => 'indonesian-volcanic-soil-edge',
                'title_id' => 'Keunggulan Tanah Vulkanik Indonesia: Bagaimana Andisol Gunung Batur Meningkatkan Keasaman Kopi',
                'title_en' => 'The Edge of Indonesian Volcanic Soil: How Mount Batur Andisols Enhance Coffee Acidity',
                'category_id' => 'Jurnal Agronomi',
                'category_en' => 'Agronomy Journal',
                'image' => 'https://images.unsplash.com/photo-1527018601619-a508a2be00cd?q=80&w=400',
                'date_published' => '2026-05-14',
                'read_time_id' => '9 Menit Baca',
                'read_time_en' => '9 Min Read',
                'summary_id' => 'Analisis mendalam mengenai tanah andisol vulkanik. Bagaimana penyerapan fosfat yang tinggi dan cadangan kalium di lereng Kintamani mempercepat sintesis senyawa organik pada buah ceri kopi Bali.',
                'summary_en' => 'An in-depth analysis of volcanic andisol soil. How high phosphate absorption and potassium reserves on Kintamani slopes accelerate organic compound synthesis in Bali coffee cherries.',
            ],
            [
                'slug' => 'navigating-customs-protocols',
                'title_id' => 'Navigasi Protokol Bea Cukai: Mempermudah Dokumentasi Fitosanitari dan Surat Keterangan Asal',
                'title_en' => 'Navigating Customs Protocols: Streamlining Phytosanitary and Certificate of Origin Documentation',
                'category_id' => 'Regulasi Perdagangan',
                'category_en' => 'Trade Regulation',
                'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=400',
                'date_published' => '2026-04-03',
                'read_time_id' => '7 Menit Baca',
                'read_time_en' => '7 Min Read',
                'summary_id' => 'Panduan kepatuhan langkah-demi-langkah bagi importir internasional, mencakup pendaftaran FDA, sertifikat fitosanitari, dan tanda negara asal dari Organisasi Kopi Internasional (ICO).',
                'summary_en' => 'A step-by-step compliance guide for international importers, covering FDA registration, phytosanitary certificates, and official International Coffee Organization (ICO) origin marks.',
            ],
        ];

        foreach ($articles as $data) {
            Article::create($data);
        }
    }
}
