<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Hiroshi Tanaka',
                'role_id' => 'Managing Director, Zenith Specialty Roasters (Tokyo)',
                'role_en' => 'Managing Director, Zenith Specialty Roasters (Tokyo)',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?q=80&w=200',
                'rating' => 5,
                'quote_id' => 'Nayaka Atelier telah mengubah cara kami mendatangkan kopi dari Indonesia. Gayo Anaerobic Honey mereka mendapatkan skor cupping luar biasa 90.5 dan tiba di Tokyo dalam kemasan vakum tanpa degradasi kelembapan sedikit pun. Integritas ekspor B2B yang tiada tanding.',
                'quote_en' => 'Nayaka Atelier has transformed how we source coffee from Indonesia. Their Gayo Anaerobic Honey scored an outstanding 90.5 and arrived in Tokyo in vacuum boxes without a single drop in moisture stability. Unmatched B2B export integrity.',
                'sort_order' => 1,
            ],
            [
                'name' => 'Emma Sterling',
                'role_id' => 'Sourcing Lead, Seattle Coffee Merchants',
                'role_en' => 'Sourcing Lead, Seattle Coffee Merchants',
                'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=200',
                'rating' => 5,
                'quote_id' => 'Menemukan lot mikro proses carbonic maceration dari Bali yang konsisten dulunya adalah tantangan logistik besar. Nayaka Export menyediakan data ketertelusuran langsung, sampel uji DHL cepat, dan sertifikasi fitosanitari yang sempurna. Eksportir yang sangat direkomendasikan.',
                'quote_en' => 'Sourcing consistent carbonic maceration micro-lots from Bali was once a major logistical challenge. Nayaka Export provides live traceability data, rapid DHL test samples, and perfect phytosanitary certification. Highly recommended exporter.',
                'sort_order' => 2,
            ],
            [
                'name' => 'Guillaume Dupont',
                'role_id' => 'Head of Quality, Hamburg Coffee Trading House',
                'role_en' => 'Head of Quality, Hamburg Coffee Trading House',
                'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=200',
                'rating' => 5,
                'quote_id' => 'Metrik pelacakan lot Java Preanger 40 sangat akurat. Kami sangat menghargai transparansi lengkap mereka—ketinggian lahan, catatan kelembapan, dan jumlah cacat biji benar-benar tepat. Nayaka mengirimkan biji hijau kelas kompetisi dengan profesionalisme mutlak.',
                'quote_en' => 'The lot tracking metrics for Java Preanger 40 are incredibly accurate. We highly appreciate their complete transparency—elevation, moisture records, and defect counts are absolutely spot on. Nayaka delivers competition-grade green beans with absolute professionalism.',
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $data) {
            Testimonial::create($data);
        }
    }
}
