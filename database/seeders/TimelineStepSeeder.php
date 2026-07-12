<?php

namespace Database\Seeders;

use App\Models\TimelineStep;
use Illuminate\Database\Seeder;

class TimelineStepSeeder extends Seeder
{
    public function run(): void
    {
        $steps = [
            [
                'step_number' => 1,
                'title_id' => 'Terroir & Penanaman',
                'title_en' => 'Terroir & Cultivation',
                'subtitle_id' => 'Kebun Teduh Ketinggian Ekstrem',
                'subtitle_en' => 'Extreme Altitude Shade Estates',
                'description_id' => 'Pohon kopi kami tumbuh subur di bawah naungan pohon penaung organik di ketinggian 1.500m hingga 2.100m pada tanah vulkanik subur, mengembangkan kerapatan gula yang tinggi dan asam organik kompleks untuk menghasilkan kopi kelas kompetisi.',
                'description_en' => 'Our coffee trees thrive under organic shade canopies at 1,500m to 2,100m in rich volcanic soil, developing high sugar density and complex organic acids for competition-grade cups.',
                'icon' => 'Mountain',
            ],
            [
                'step_number' => 2,
                'title_id' => 'Seleksi Ceri Standar SCA',
                'title_en' => 'SCA Standard Cherry Selection',
                'subtitle_id' => 'Pemetikan Manual yang Presisi',
                'subtitle_en' => 'Precise Handpicking Cycles',
                'description_id' => 'Petani melakukan hingga 5 kali siklus pemetikan selama panen, hanya memilih ceri merah ranum dengan tingkat kemanisan Brix >20%. Ceri yang belum matang atau cacat segera dipisahkan.',
                'description_en' => 'Farmers conduct up to 5 handpicking passes during harvest, choosing only deep-red cherries at peak Brix sweetness (>20%). Underripe or defective cherries are immediately separated.',
                'icon' => 'FlameKindling',
            ],
            [
                'step_number' => 3,
                'title_id' => 'Proses Anaerobik & Pengolahan Mikro',
                'title_en' => 'Anaerobic & Micro-Processing',
                'subtitle_id' => 'Kontrol Fermentasi Ketat',
                'subtitle_en' => 'Strict Fermentation Control',
                'description_id' => 'Buah kopi melalui maserasi karbonik ragi liar yang lembut dan pengeringan lambat di atas meja jemur. Kadar air diperiksa secara berkala menggunakan probe digital untuk mencapai standar mutlak 11,0%.',
                'description_en' => 'Fruit undergoes delicate wild-yeast anaerobic maceration and slow drying on raised beds. Moisture levels are systematically checked with digital probes to hit the exact 11.0% target.',
                'icon' => 'Sun',
            ],
            [
                'step_number' => 4,
                'title_id' => 'Hulling Kering & Sortasi Densitas',
                'title_en' => 'Dry Hulling & Density Sorting',
                'subtitle_id' => 'Pemisahan Cacat Mutu Standar SCA',
                'subtitle_en' => 'Triple-Picked Defect Sorting',
                'description_id' => 'Kopi dikupas, disortir menggunakan meja gravitasi, dan disortir ulang secara manual sebanyak tiga kali (triple-picked). Kami menjamin status SCA Specialty Grade 1 dengan kurang dari 5 cacat sekunder per 350g sampel.',
                'description_en' => 'Parchment is hulled, density-sorted on gravity tables, and hand-sorted three times (triple-picked). We guarantee SCA Specialty Grade 1 status with less than 5 secondary defects per 350g sample.',
                'icon' => 'Sparkles',
            ],
            [
                'step_number' => 5,
                'title_id' => 'Pengujian Cupping Q-Grader',
                'title_en' => 'Q-Grader Cupping Verification',
                'subtitle_id' => 'Protokol Penilaian Resmi',
                'subtitle_en' => 'Official Evaluation Protocol',
                'description_id' => 'Setiap kelompok panen diuji cupping di laboratorium ekspor kami oleh Q-Grader bersertifikat. Kami hanya merilis lot kopi yang mencapai nilai minimal 88+ poin SCA untuk dimasukkan dalam katalog ekspor resmi kami.',
                'description_en' => 'Every batch is cupped in our export lab by certified Q-Graders. We only release coffee lots that score a minimum of 88+ SCA points to be included in our official export catalog.',
                'icon' => 'CheckCircle',
            ],
            [
                'step_number' => 6,
                'title_id' => 'Pengiriman Kargo Hermetis',
                'title_en' => 'Hermetic Cargo Shipping',
                'subtitle_id' => 'Perlindungan GrainPro di Laut',
                'subtitle_en' => 'Ocean-Safe GrainPro Protection',
                'description_id' => 'Segel kantong pelindung GrainPro berlapis-lapis di dalam karung rami mencegah penurunan mutu akibat kelembapan laut selama pelayaran kontainer trans-samudra, dikirim lengkap dengan sertifikasi kepabeanan.',
                'description_en' => 'Multi-layered GrainPro hermetic bag sealing inside jute sacks prevents deterioration from sea humidity during container ocean voyages, shipped with full customs clearance docs.',
                'icon' => 'Truck',
            ],
        ];

        foreach ($steps as $data) {
            TimelineStep::create($data);
        }
    }
}
