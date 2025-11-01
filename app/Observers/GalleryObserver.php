<?php

namespace App\Observers;

use App\Models\Gallery;

class GalleryObserver
{
    /**
     * Handle the Gallery "saving" event.
     */
    public function saving(Gallery $gallery): void
    {
        // Jika gallery ini diset sebagai hero
        if ($gallery->is_hero) {
            // Unset semua gallery hero yang lain
            Gallery::where('is_hero', true)
                ->where('id', '!=', $gallery->id)
                ->update(['is_hero' => false]);
        }
    }
}
