<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'type',     // photo | video
        'file',
        'is_hero',
        'is_achievement',
        'hero_order',
        'category',   // prestasi | about | moments
        'description', // untuk teks About Us
    ];

    protected $casts = [
        'is_hero' => 'boolean',
        'is_achievement' => 'boolean',
    ];

      protected $appends = ['file_url'];

    /**
     * Accessor untuk menampilkan URL file yang tersimpan di storage/public/galleries.
     */
   public function getFileUrlAttribute()
    {
        return $this->file
            ? asset('storage/' . $this->file)
            : null;
    }

    /**
     * Backwards-compatible accessor so templates using ->image still work.
     */
    public function getImageAttribute(): ?string
    {
        return $this->getFileUrlAttribute();
    }

    /**
     * Backwards-compatible accessor for caption -> maps to title.
     */
    public function getCaptionAttribute(): ?string
    {
        return $this->title ?? null;
    }

    /**
     * Helper untuk cek apakah media ini adalah foto.
     */
    public function isPhoto(): bool
    {
        return $this->type === 'photo';
    }

    /**
     * Helper untuk cek apakah media ini adalah video.
     */
    public function isVideo(): bool
    {
        return $this->type === 'video';
    }
}
