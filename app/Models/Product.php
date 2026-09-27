<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'short_description',
        'description',
        'material',
        'custom_info',
        'minimum_order',
        'price',
        'price_label',
        'featured',
        'status',
        'sort_order',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'featured' => 'boolean',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class)->orderBy('sort_order', 'asc');
    }

    public function primaryImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->orderByDesc('is_primary')->orderBy('sort_order', 'asc');
    }

    public function getDisplayPriceAttribute(): string
    {
        if ($this->price && $this->price > 0) {
            $formatted = 'Rp ' . number_format($this->price, 0, ',', '.');
            return $this->price_label ? "{$this->price_label} {$formatted}" : $formatted;
        }

        return $this->price_label ?: 'Konsultasi';
    }

    public function getWhatsAppUrl(?string $phoneNumber = null): string
    {
        $phone = $phoneNumber ?: SiteSetting::get('whatsapp', '6281234567890');
        // Clean phone number (remove +, spaces, hyphens)
        $cleanPhone = preg_replace('/[^0-9]/', '', $phone);
        if (str_starts_with($cleanPhone, '0')) {
            $cleanPhone = '62' . substr($cleanPhone, 1);
        }

        $message = "Halo, saya tertarik dengan produk:\n\n*{$this->name}*\n\nSaya ingin menanyakan informasi mengenai estimasi harga, minimal order, dan proses pengerjaannya.\n\nTerima kasih.";

        return "https://wa.me/{$cleanPhone}?text=" . rawurlencode($message);
    }
}
