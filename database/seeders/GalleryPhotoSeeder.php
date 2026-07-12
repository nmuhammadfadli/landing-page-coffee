<?php

namespace Database\Seeders;

use App\Models\GalleryPhoto;
use Illuminate\Database\Seeder;

class GalleryPhotoSeeder extends Seeder
{
    public function run(): void
    {
        $photos = [
            [
                'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?q=80&w=400',
                'title_id' => 'Kebun Tanah Vulkanik',
                'title_en' => 'Volcanic Soil Estates',
                'desc_id' => 'Pohon kopi kami tumbuh subur di ketinggian 1.600m di bawah naungan pohon pelindung di dataran tinggi Gayo, Sumatra.',
                'desc_en' => 'Our coffee trees thrive at 1,600m under shade-growing forest canopies in the Gayo highlands, Sumatra.',
                'sort_order' => 1,
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1447933601403-0c6688de566e?q=80&w=400',
                'title_id' => 'Patio Pengeringan',
                'title_en' => 'Drying Patio & Beds',
                'desc_id' => 'Meja penjemuran ceri proses honey yang dikeringkan perlahan di bawah sinar matahari untuk mencapai kadar air ideal 11%.',
                'desc_en' => 'Raised drying tables for honey-processed cherries, slowly dried under the sun to achieve the ideal 11% moisture level.',
                'sort_order' => 2,
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1527018601619-a508a2be00cd?q=80&w=400',
                'title_id' => 'Laboratorium Q-Grader',
                'title_en' => 'Q-Grader Lab',
                'desc_id' => 'Sesi evaluasi rasa (cupping) sesuai standar SCA untuk mengukur kebersihan rasa, tingkat kemanisan, dan kompleksitas aroma.',
                'desc_en' => 'Sensory evaluation (cupping) sessions under SCA standards to measure cup cleanliness, sweetness, and complex flavor profiles.',
                'sort_order' => 3,
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1514432324607-a09d9b4aefdd?q=80&w=400',
                'title_id' => 'Kemasan Hermetis GrainPro',
                'title_en' => 'GrainPro Hermetic Bags',
                'desc_id' => 'Biji kopi mentah kami dikemas dalam kantong pelindung kedap udara multi-layer guna menjaga kesegaran rasa selama pelayaran samudera.',
                'desc_en' => 'Our green coffee is packaged in multi-layer airtight hermetic bags to lock in flavor freshness during long ocean transits.',
                'sort_order' => 4,
            ],
            [
                'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?q=80&w=400',
                'title_id' => 'Profil Sangrai Sampel',
                'title_en' => 'Sample Roasting Profiles',
                'desc_id' => 'Penyangraian contoh lot kecil untuk menguji tingkat ekstraksi rasa, ekspansi biji kopi, dan keseragaman warna sangrai.',
                'desc_en' => 'Small-batch roasting of sample lots to evaluate flavor extraction, physical bean expansion, and roast color uniformity.',
                'sort_order' => 5,
            ],
        ];

        foreach ($photos as $data) {
            GalleryPhoto::create($data);
        }
    }
}
