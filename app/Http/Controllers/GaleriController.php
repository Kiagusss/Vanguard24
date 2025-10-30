<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GaleriController extends Controller
{
    public function index()
    {
        $photos = Gallery::latest()->get();
        $heroPhotos = Gallery::where('is_hero', true)->latest()->get();

        // If no explicit hero photos, fallback to first N gallery images
        if ($heroPhotos->isEmpty()) {
            $heroPhotos = $photos->take(6);
        }

        return view('galeri', compact('photos', 'heroPhotos'));
    }
}
