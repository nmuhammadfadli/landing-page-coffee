<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question_id' => 'Bagaimana cara Anda mengirimkan sampel biji kopi mentah (green bean)?',
                'question_en' => 'How do you ship green coffee bean samples?',
                'answer_id' => 'Kami mengirimkan sampel fisik biji mentah (kemasan 200g - 350g) ke seluruh dunia melalui kurir ekspres premium (FedEx, DHL, atau UPS). Sampel dapat disangrai langsung sesuai permintaan menggunakan Ikawa sample roaster atau dikirim mentah sepenuhnya tergantung kenyamanan Anda. Hubungi meja ekspor kami untuk meminta penawaran.',
                'answer_en' => 'We ship physical green coffee samples (200g - 350g packs) worldwide via premium express couriers (FedEx, DHL, or UPS). Samples can be roasted on demand using our Ikawa sample roaster or shipped fully raw, depending on your preference. Contact our export desk to request a kit.',
                'sort_order' => 1,
            ],
            [
                'question_id' => 'Berapa Jumlah Pesanan Minimum (MOQ) untuk pengiriman kargo?',
                'question_en' => 'What is the Minimum Order Quantity (MOQ) for cargo shipping?',
                'answer_id' => 'MOQ standar untuk ekspor kami adalah 1 karung penuh berkapasitas 60kg (dilengkapi GrainPro). Kami juga mendukung pengiriman konsolidasi LCL (Less than Container Load) untuk penyangrai skala menengah serta kontainer penuh FCL (Full Container Load, berisi sekitar 320 karung / 19,2 ton) untuk pembeli grosir langsung.',
                'answer_en' => 'Our standard MOQ for export is 1 full bag of 60kg (equipped with GrainPro liner). We also support consolidated LCL (Less than Container Load) shipments for medium-scale roasters and FCL (Full Container Load, approx. 320 bags / 19.2 tons) for direct wholesale buyers.',
                'sort_order' => 2,
            ],
            [
                'question_id' => 'Sertifikasi internasional apa saja yang Anda sediakan?',
                'question_en' => 'What international certifications do you provide?',
                'answer_id' => 'Setiap pengiriman kargo ekspor disertai Sertifikat Fitosanitari dari karantina pertanian, Surat Keterangan Asal (Form A / COO), tanda ICO resmi, Sertifikat Halal, sertifikasi Organik USDA/EU jika berlaku, serta Laporan Resmi Cupping & Defect biji kopi dari Q-Grader bersertifikat.',
                'answer_en' => 'Every export cargo shipment is accompanied by a Phytosanitary Certificate from agricultural quarantine, a Certificate of Origin (Form A / COO), official ICO marks, Halal Certificate, USDA/EU Organic certification where applicable, and official Cupping & Defect reports from certified Q-Graders.',
                'sort_order' => 3,
            ],
            [
                'question_id' => 'Bagaimana biji kopi mentah dilindungi selama perjalanan laut agar tidak rusak?',
                'question_en' => 'How is green coffee protected from damage during ocean transit?',
                'answer_id' => 'Semua biji kopi mentah kami dikemas dalam kantong hermetis GrainPro dengan perlindungan tinggi di dalam karung rami tebal, atau dikemas vakum khusus dalam kotak aluminium. Ini mencegah masuknya kelembapan eksternal, mengunci kelembapan relatif biji di kisaran 11%, dan melindungi biji dari jamur pelayaran.',
                'answer_en' => 'All our green beans are packaged in high-barrier GrainPro hermetic bags inside thick jute sacks, or custom vacuum-sealed in aluminum foil boxes. This prevents external humidity ingress, locks relative moisture around 11%, and shields the beans from ship mold.',
                'sort_order' => 4,
            ],
            [
                'question_id' => 'Bagaimana Anda menawarkan harga berdasarkan ketentuan FOB, CIF, atau DDP?',
                'question_en' => 'Do you offer FOB, CIF, or DDP pricing terms?',
                'answer_id' => 'Kami umumnya memberikan kuotasi harga FOB (Free On Board) dari Pelabuhan Tanjung Priok (Jakarta) atau Pelabuhan Belawan (Medan). Namun, kami juga dapat mengatur pengiriman CIF (Cost, Insurance, and Freight) ke pelabuhan laut utama dunia, atau ketentuan kargo udara untuk lot mikro yang sangat eksklusif.',
                'answer_en' => 'We typically quote FOB (Free On Board) prices from Tanjung Priok Port (Jakarta) or Belawan Port (Medan). However, we can also arrange CIF (Cost, Insurance, and Freight) shipping to major global ports, or air cargo terms for ultra-exclusive micro-lots.',
                'sort_order' => 5,
            ],
        ];

        foreach ($faqs as $data) {
            FAQ::create($data);
        }
    }
}
