<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\PortfolioImage;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@tokoacc.com'],
            [
                'name' => 'Admin Toko Jaya Promosi Lestari',
                'password' => Hash::make('password'),
            ]
        );

        // 2. Site Settings
        $settings = [
            'site_name' => 'Aksesorisku.store',
            'tagline' => 'Pusat Custom Rubber, Cetak Medali & Aksesoris Karet | Jaya Promosi Lestari',
            'description' => 'Digital showroom & workshop produsen aksesoris karet custom (print rubber, rubber patch, wristband), cetak medali kejuaraan (logam cor & akrilik), serta gantungan kunci suvenir oleh Jaya Promosi Lestari.',
            'whatsapp' => '6282326170804',
            'phone' => '+62 823-2617-0804',
            'email' => 'kontak@aksesorisku.store',
            'address' => 'Jl. Sayuran Kavling Hiu Macan No. 40 RT 002 RW 008 Desa Cangkuang Kulon, Kec. Dayeuh Kolot, Kabupaten Bandung, Jawa Barat, Indonesia.',
            'opening_hours' => "Senin - Jumat: 08.00 - 17.00 WIB\nSabtu: 08.00 - 15.00 WIB\nMinggu: Libur / Tutup",
            'google_maps_url' => 'https://maps.app.goo.gl/nk1WTiQheCXuF9ug9',
            'google_maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2648080653157!2d107.58943557405446!3d-6.978049768329252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e96e616a4fef%3A0xa479cad17299b64b!2sSovenir%20karet%20cahaya%20lestari!5e0!3m2!1sen!2sid!4v1790502156537!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>',
            'instagram' => 'https://instagram.com/tokoacc_custom',
            'facebook' => 'https://facebook.com/tokoacc.custom',
            'tiktok' => 'https://tiktok.com/@tokoacc.custom',
            'meta_keywords' => 'aksesorisku.store, aksesorisku, jaya promosi lestari, aksesoris karet, print rubber, cetak medali, gantungan kunci karet, rubber patch velcro, medali kejuaraan custom, souvenir karet bandung, pabrik karet custom',
            'meta_google_verification' => '9Gew-qEbKHJjk-C3SbZRtVwI0nUo4SFLJVGHwOkqd8Y',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // 3. Categories
        $catRubber = Category::updateOrCreate(
            ['slug' => 'rubber-karet'],
            [
                'name' => 'Rubber / Karet',
                'description' => 'Produk rubber PVC berkualitas presisi, elastis, tahan air, dan awet dengan detail warna tajam 2D maupun 3D.',
                'image' => '/images/categories/rubber.jpg',
                'status' => true,
                'sort_order' => 1,
            ]
        );

        $catMedal = Category::updateOrCreate(
            ['slug' => 'medali-custom'],
            [
                'name' => 'Medali Custom',
                'description' => 'Medali cor logam zinc alloy, kuningan finishing antik, dan akrilik cetak UV untuk kejuaraan lomba, event lari, dan wisuda.',
                'image' => '/images/categories/medals.jpg',
                'status' => true,
                'sort_order' => 2,
            ]
        );

        $catKeychain = Category::updateOrCreate(
            ['slug' => 'gantungan-kunci'],
            [
                'name' => 'Gantungan Kunci',
                'description' => 'Gantungan kunci custom aneka material: rubber PVC, akrilik bening grafir, dan logam solid untuk cinderamata dan merchandise.',
                'image' => '/images/categories/keychain.jpg',
                'status' => true,
                'sort_order' => 3,
            ]
        );

        // 4. Products
        $p1 = Product::updateOrCreate(
            ['slug' => 'rubber-keychain-3d-custom'],
            [
                'category_id' => $catRubber->id,
                'name' => 'Rubber Keychain 3D Custom',
                'short_description' => 'Gantungan kunci karet PVC cetak timbul 2D atau 3D sesuai bentuk dan desain logo yang Anda inginkan.',
                'description' => "Gantungan kunci karet custom diproduksi dengan material PVC food-grade berkualitas tinggi yang lentur, tahan air, dan tidak mudah patah. Sangat ideal untuk cinderamata komunitas, suvenir pernikahan, merchandise brand, atau promosi korporat.\n\nKeunggulan Produksi:\n- Detail timbul tajam dengan pemisahan warna rapi tanpa bleed.\n- Pilihan ring standar atau ring putar berkualitas anti-karat.\n- Bisa custom bagian belakang polos, motif serat, atau cetak tulisan embossed.",
                'material' => 'Soft PVC Rubber Berkualitas Tinggi',
                'custom_info' => 'Bebas bentuk custom, opsi 2D atau 3D relief, maksimal 8 warna solid',
                'minimum_order' => '100 pcs',
                'price' => 8500,
                'price_label' => 'Mulai dari',
                'featured' => true,
                'status' => true,
                'sort_order' => 1,
                'meta_title' => 'Rubber Keychain 3D Custom | Aksesorisku.store - Jaya Promosi Lestari',
                'meta_description' => 'Pusat custom gantungan kunci rubber PVC 3D dan 2D dari workshop Jaya Promosi Lestari di Aksesorisku.store.',
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => $p1->id, 'image' => '/images/products/rubber-keychain-1.jpg'],
            ['caption' => 'Detail cetak timbul dan kontur warna gantungan kunci rubber', 'is_primary' => true, 'sort_order' => 1]
        );

        $p2 = Product::updateOrCreate(
            ['slug' => 'medali-kejuaraan-logam-zinc-alloy'],
            [
                'category_id' => $catMedal->id,
                'name' => 'Medali Kejuaraan Logam Cor Zinc Alloy',
                'short_description' => 'Medali logam cor presisi tinggi dengan pilihan finishing emas, perak, dan perunggu antik lengkap dengan tali lanyard printing.',
                'description' => "Medali die-cast zinc alloy dirancang untuk ajang kejuaraan resmi, perlombaan olahraga, turnamen esports, dan penghargaan akademis. Memberikan bobot mantap dan kesan prestisius saat dikalungkan.\n\nSpesifikasi Produksi:\n- Ketebalan medali 3 mm sampai 5 mm sesuai kebutuhan.\n- Finishing: Gold shiny, Antique Gold, Silver polished, dan Antique Bronze.\n- Termasuk tali lanyard printing sublimasi full-color lebar 2.5 cm sampai 3 cm.",
                'material' => 'Zinc Alloy / Logam Cor Padat',
                'custom_info' => 'Diameter 6 cm - 8 cm, tali lanyard custom motif, ukiran timbul dua sisi',
                'minimum_order' => '50 pcs',
                'price' => 28000,
                'price_label' => 'Mulai dari',
                'featured' => true,
                'status' => true,
                'sort_order' => 2,
                'meta_title' => 'Cetak Medali Kejuaraan Logam Zinc Alloy | Aksesorisku.store - Jaya Promosi Lestari',
                'meta_description' => 'Produksi cetak medali custom die-cast logam cor kejuaraan dan perlombaan di Aksesorisku.store (Jaya Promosi Lestari).',
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => $p2->id, 'image' => '/images/products/custom-medal-1.jpg'],
            ['caption' => 'Tampilan medali emas, perak, perunggu dengan tali lanyard bermotif', 'is_primary' => true, 'sort_order' => 1]
        );

        $p3 = Product::updateOrCreate(
            ['slug' => 'rubber-patch-velcro-emblem'],
            [
                'category_id' => $catRubber->id,
                'name' => 'Rubber Patch Velcro / Emblem Karet',
                'short_description' => 'Patch karet timbul dengan jahitan velcro halus untuk seragam, tas taktis, jaket komunitas, dan topi.',
                'description' => "Emblem karet dengan backing velcro rekat kuat (hook & loop) siap pasang pada pakaian, topi, rompi, atau tas perlengkapan. Tahan cuaca ekstrem, mudah dibersihkan dari debu atau lumpur cukup dilap air.\n\nSpesifikasi:\n- Dilengkapi list jahitan keliling agar velcro merekat permanen.\n- Tekstur micro-detail dapat mencetak tipografi kecil dengan presisi.",
                'material' => 'Molded PVC Rubber + Velcro Backing',
                'custom_info' => 'Bentuk bebas: perisai, lingkaran, persegi panjang atau custom kontur',
                'minimum_order' => '50 pcs',
                'price' => 12500,
                'price_label' => 'Mulai dari',
                'featured' => true,
                'status' => true,
                'sort_order' => 3,
                'meta_title' => 'Rubber Patch Velcro Custom & Emblem Karet | Aksesorisku.store',
                'meta_description' => 'Bikin patch emblem karet velcro dan aksesoris karet custom di Aksesorisku.store (Workshop Jaya Promosi Lestari).',
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => $p3->id, 'image' => '/images/products/rubber-patch-1.jpg'],
            ['caption' => 'Emblem karet velcro dan wristband cetak timbul', 'is_primary' => true, 'sort_order' => 1]
        );

        $p4 = Product::updateOrCreate(
            ['slug' => 'gantungan-kunci-metal-akrilik-presisi'],
            [
                'category_id' => $catKeychain->id,
                'name' => 'Gantungan Kunci Metal & Akrilik Grafir',
                'short_description' => 'Gantungan kunci berbahan logam zinc alloy elegan dan akrilik bening potong laser dengan grafir presisi tinggi.',
                'description' => "Kombinasi modern antara akrilik transparan tebal dengan ring logam premium, atau pelat logam brushed solid dengan grafir laser permanen. Memberikan sentuhan elegan untuk merchandise hotel, suvenir showroom otomotif, atau gift korporat eksklusif.",
                'material' => 'Akrilik Bening Tebal 4mm & Logam Brushed Alloy',
                'custom_info' => 'Cetak UV timbal balik atau grafir laser presisi',
                'minimum_order' => '50 pcs',
                'price' => 15000,
                'price_label' => 'Mulai dari',
                'featured' => false,
                'status' => true,
                'sort_order' => 4,
                'meta_title' => 'Gantungan Kunci Metal & Akrilik Grafir | Aksesorisku.store',
                'meta_description' => 'Merchandise gantungan kunci akrilik laser cut dan pelat logam solid untuk suvenir perusahaan di Aksesorisku.store.',
            ]
        );

        ProductImage::updateOrCreate(
            ['product_id' => $p4->id, 'image' => '/images/products/metal-acrylic-keychain.jpg'],
            ['caption' => 'Gantungan kunci akrilik presisi dan pelat logam finishing matte', 'is_primary' => true, 'sort_order' => 1]
        );

        // 5. Portfolios
        $port1 = Portfolio::updateOrCreate(
            ['slug' => 'medali-kejuaraan-futsal-regional'],
            [
                'title' => 'Medali Kejuaraan Futsal Regional Pelajar',
                'description' => 'Produksi 150 keping medali emas, perak, dan perunggu berbahan die-cast alloy dengan finishing antique polish serta tali lanyard motif batik kontemporer.',
                'category' => 'Medali Custom',
                'client_name' => 'Panitia Pekan Olahraga Pelajar',
                'project_year' => '2024',
                'cover_image' => '/images/portfolio/medali-kejuaraan.jpg',
                'status' => true,
                'sort_order' => 1,
            ]
        );

        PortfolioImage::updateOrCreate(
            ['portfolio_id' => $port1->id, 'image' => '/images/portfolio/medali-kejuaraan.jpg'],
            ['caption' => 'Hasil produksi medali logam cor kejuaraan pelajar', 'sort_order' => 1]
        );

        $port2 = Portfolio::updateOrCreate(
            ['slug' => 'rubber-patch-dan-keychain-komunitas-outdoor'],
            [
                'title' => 'Rubber Patch & Keychain Komunitas Petualang',
                'description' => 'Pembuatan 300 pcs patch velcro karet dan 500 pcs gantungan kunci rubber 3D untuk official merchandise ekspedisi alam terbuka.',
                'category' => 'Rubber / Karet',
                'client_name' => 'Komunitas Mountain Expedition',
                'project_year' => '2024',
                'cover_image' => '/images/portfolio/rubber-patch-komunitas.jpg',
                'status' => true,
                'sort_order' => 2,
            ]
        );

        PortfolioImage::updateOrCreate(
            ['portfolio_id' => $port2->id, 'image' => '/images/portfolio/rubber-patch-komunitas.jpg'],
            ['caption' => 'Set patch velcro dan gelang karet hasil pengerjaan workshop', 'sort_order' => 1]
        );

        $port3 = Portfolio::updateOrCreate(
            ['slug' => 'merchandise-gantungan-kunci-korporat'],
            [
                'title' => 'Merchandise Gantungan Kunci Korporat & Showroom',
                'description' => 'Paket suvenir eksklusif gantungan kunci logam dengan grafir laser identitas korporat sebanyak 1.000 unit untuk suvenir akhir tahun.',
                'category' => 'Gantungan Kunci',
                'client_name' => 'PT Mitra Otomotif Nusantara',
                'project_year' => '2023',
                'cover_image' => '/images/portfolio/gantungan-kunci-metal.jpg',
                'status' => true,
                'sort_order' => 3,
            ]
        );

        PortfolioImage::updateOrCreate(
            ['portfolio_id' => $port3->id, 'image' => '/images/portfolio/gantungan-kunci-metal.jpg'],
            ['caption' => 'Gantungan kunci logam dan akrilik cetak laser', 'sort_order' => 1]
        );

        // 6. Testimonials (Structured & Transparent)
        Testimonial::updateOrCreate(
            ['name' => 'Bambang Irawan'],
            [
                'organization' => 'Ketua Panitia Futsal Cup',
                'photo' => null,
                'rating' => 5,
                'content' => 'Hasil medali logamnya rapi dan berbobot mantap. Tali lanyard dicetak tajam sesuai file desain kami tanpa kendala warna. Pengiriman tiba 3 hari sebelum jadwal acara.',
                'status' => true,
                'sort_order' => 1,
            ]
        );

        Testimonial::updateOrCreate(
            ['name' => 'Faris Pratama'],
            [
                'organization' => 'Koordinator Merchandise Komunitas',
                'photo' => null,
                'rating' => 5,
                'content' => 'Pengerjaan rubber patch velcro sangat teliti, gradasi warna karet tidak meluber. Tim workshop komunikatif saat verifikasi cetakan sampel lewat WhatsApp.',
                'status' => true,
                'sort_order' => 2,
            ]
        );

        Testimonial::updateOrCreate(
            ['name' => 'Ratna Dewi'],
            [
                'organization' => 'Procurement Officer PT Bahana Event',
                'photo' => null,
                'rating' => 5,
                'content' => 'Sudah 3 kali repeat order untuk suvenir gantungan kunci akrilik dan medali lomba tahunan. Proses diskusi spesifikasi sangat transparan dan estimasi pengerjaan tepat waktu.',
                'status' => true,
                'sort_order' => 3,
            ]
        );
    }
}
