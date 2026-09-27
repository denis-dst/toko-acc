<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('material')->nullable(); // e.g. Rubber / PVC, Logam Logam Cor Zinc Alloy, Akrilik
            $table->string('custom_info')->nullable(); // e.g. Desain 2D / 3D, Custom Warna & Ukuran
            $table->string('minimum_order')->nullable(); // e.g. 50 pcs
            $table->decimal('price', 12, 2)->nullable();
            $table->string('price_label')->default('Konsultasi'); // e.g. Konsultasi, Mulai dari
            $table->boolean('featured')->default(false);
            $table->boolean('status')->default(true);
            $table->integer('sort_order')->default(0);
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
