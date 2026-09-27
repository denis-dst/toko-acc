<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organization',
        'photo',
        'rating',
        'content',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getPhotoUrlAttribute(): string
    {
        if (!$this->photo) {
            return '';
        }

        if (str_starts_with($this->photo, 'http://') || str_starts_with($this->photo, 'https://') || str_starts_with($this->photo, '/')) {
            return $this->photo;
        }

        return Storage::disk('public')->url($this->photo);
    }
}
