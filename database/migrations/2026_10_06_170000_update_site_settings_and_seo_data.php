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
