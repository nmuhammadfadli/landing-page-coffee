<?php

namespace Database\Seeders;

use App\Models\BrewGuide;
use Illuminate\Database\Seeder;

class BrewGuideSeeder extends Seeder
{
    public function run(): void
    {
        $guides = [
            [
                'name_id' => 'Protokol Cupping SCA (Standar Ekspor)',
                'name_en' => 'SCA Cupping Protocol (Export Standard)',
                'photo' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=400',
                'ratio' => '1:18.18 (8.25g Kopi / 150g Air)',
                'temperature' => '93°C / 200°F',
                'time_id' => '4:00 Menit perendaman',
                'time_en' => '4:00 Minutes steep time',
                'grind_size_id' => 'Medium-Coarse (seperti garam laut kasar)',
                'grind_size_en' => 'Medium-Coarse (resembling sea salt)',
                'description_id' => 'Standar sensorik internasional. Digunakan oleh importir, roaster, dan Q-Grader di seluruh dunia untuk menilai kualitas kopi secara objektif. Metode ini menonjolkan kebersihan rasa, keseragaman, kemanisan, keasaman, dan skor akhir tanpa bias alat seduh.',
                'description_en' => 'International sensory standard. Used by importers, roasters, and Q-Graders worldwide to assess coffee quality objectively. This method highlights cup cleanliness, uniformity, sweetness, acidity, and final score without brewer bias.',
                'steps_id' => [
                    'Timbang tepat 8.25g biji kopi sangrai dan giling segar langsung ke dalam mangkuk cupping.',
                    'Evaluasi aroma kering dari bubuk kopi dalam waktu 15 menit setelah digiling.',
                    'Tuangkan 150g air bersih bersuhu 93°C langsung di atas bubuk, pastikan basah merata.',
                    'Biarkan kerak kopi (crust) terbentuk dan diamkan selama 4 menit tanpa gangguan.',
                    'Pada menit ke-4, pecahkan kerak (break the crust) dengan sendok cupping hangat. Hirup aromanya.',
                    'Bersihkan sisa busa dan partikel terapung di permukaan. Biarkan mendingin hingga 71°C untuk mulai mencicipi.',
                ],
                'steps_en' => [
                    'Weigh exactly 8.25g of roasted coffee beans and grind fresh directly into the cupping bowl.',
                    'Evaluate the dry aroma of the coffee grounds within 15 minutes of grinding.',
                    'Pour 150g of clean water at 93°C directly over the grounds, ensuring even wetting.',
                    'Allow the coffee crust to form and steep undisturbed for 4 minutes.',
                    'At minute 4, break the crust using a warm cupping spoon. Inhale the aroma deeply.',
                    'Clear remaining foam and floating particles. Allow to cool to 71°C to begin tasting.',
                ],
            ],
            [
                'name_id' => 'Hario V60 Pour Over (Kalibrasi Penyangrai)',
                'name_en' => 'Hario V60 Pour Over (Roaster Calibration)',
                'photo' => 'https://images.unsplash.com/photo-1544787219-7f47ccb76574?q=80&w=400',
                'ratio' => '1:16 (15g Kopi / 240g Air)',
                'temperature' => '94°C / 201°F',
                'time_id' => '3:00 Menit',
                'time_en' => '3:00 Minutes',
                'grind_size_id' => 'Medium-Fine (seperti garam dapur)',
                'grind_size_en' => 'Medium-Fine (like table salt)',
                'description_id' => 'Sangat baik untuk menonjolkan keunikan rasa kopi single-origin yang kompleks. Corong kerucut memperkuat aroma bunga yang lembut, keasaman sitrus yang cerah, dan kejernihan rasa yang luar biasa bersih.',
                'description_en' => 'Excellent for highlighting the unique characteristics of complex single-origin coffees. The conical shape amplifies delicate floral notes, bright citric acidity, and outstanding flavor clarity.',
                'steps_id' => [
                    'Bilas kertas saring dengan air mendidih untuk menghilangkan rasa kertas, lalu panaskan dripper keramik.',
                    'Masukkan 15g bubuk kopi segar, ratakan permukaan kopi, dan atur timbangan ke angka nol.',
                    'Tuang 40g air untuk tahap blooming. Putar perlahan dan tunggu 45 detik agar gas CO2 terlepas.',
                    'Tuangkan air dalam spiral melingkar lambat hingga mencapai 150g, jaga agar air tidak mengenai kertas langsung.',
                    'Biarkan mengalir sedikit, kemudian lakukan penuangan akhir secara terus-menerus hingga mencapai 240g.',
                    'Goyangkan dripper secara perlahan untuk mendapatkan permukaan bubuk yang datar dan rata. Biarkan menetes habis.',
                ],
                'steps_en' => [
                    'Rinse the paper filter with boiling water to eliminate paper taste and pre-heat the ceramic dripper.',
                    'Add 15g of fresh coffee grounds, level the bed, and tare the scale to zero.',
                    'Pour 40g of water for the bloom. Swirl gently and wait 45 seconds for CO2 gases to release.',
                    'Pour water in slow, steady concentric circles up to 150g, keeping the stream away from the filter paper.',
                    'Allow to drain slightly, then continue the final pour smoothly until reaching 240g.',
                    'Gently swirl the dripper to flatten the coffee bed. Let it drop and drain completely.',
                ],
            ],
        ];

        foreach ($guides as $data) {
            $stepsId = $data['steps_id'];
            $stepsEn = $data['steps_en'];
            unset($data['steps_id'], $data['steps_en']);

            $guide = BrewGuide::create($data);

            foreach ($stepsId as $i => $step) {
                $guide->steps()->create([
                    'step_number' => $i + 1,
                    'step_id' => $step,
                    'step_en' => $stepsEn[$i] ?? null,
                ]);
            }
        }
    }
}
