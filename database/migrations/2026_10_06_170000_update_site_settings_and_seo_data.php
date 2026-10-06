<?php

use App\Models\SiteSetting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('site_settings')) {
            $settings = [
                'site_name' => 'Aksesorisku.store',
                'tagline' => 'Pusat Custom Rubber, Cetak Medali & Aksesoris Karet | Jaya Promosi Lestari',
                'description' => 'Digital showroom & workshop produsen aksesoris karet custom (print rubber, rubber patch, wristband), cetak medali kejuaraan (logam cor & akrilik), serta gantungan kunci suvenir oleh Jaya Promosi Lestari.',
                'email' => 'kontak@aksesorisku.store',
                'meta_keywords' => 'aksesorisku.store, aksesorisku, jaya promosi lestari, aksesoris karet, print rubber, cetak medali, gantungan kunci karet, rubber patch velcro, medali kejuaraan custom, souvenir karet bandung, pabrik karet custom',
                'meta_google_verification' => '9Gew-qEbKHJjk-C3SbZRtVwI0nUo4SFLJVGHwOkqd8Y',
                'google_analytics_id' => 'G-QWNZWEXQ7P',
                'google_maps_embed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.2648080653157!2d107.58943557405446!3d-6.978049768329252!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e96e616a4fef%3A0xa479cad17299b64b!2sSovenir%20karet%20cahaya%20lestari!5e0!3m2!1sen!2sid!4v1790502156537!5m2!1sen!2sid',
            ];

            foreach ($settings as $key => $value) {
                SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
