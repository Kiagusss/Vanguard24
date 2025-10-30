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
    ];

    protected $casts = [
        'is_hero' => 'boolean',
    ];

    /**
     * Accessor untuk menampilkan URL file yang tersimpan di storage/public/galleries.
     */
    public function getFileUrlAttribute(): ?string
    {
        if (! $this->file) {
            return null;
        }

        return Storage::url($this->file);
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
