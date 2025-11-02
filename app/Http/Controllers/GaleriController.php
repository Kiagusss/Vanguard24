<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GaleriController extends Controller
{
    public function index()
    {
        $photos = Gallery::latest()->get();
        $heroImage = Gallery::where('is_hero', true)->latest()->first();
        $achievementPhotos = Gallery::where('is_achievement', true)->latest()->get();
        $galleries = Gallery::where('is_hero', false)
                        ->where('is_achievement', false)
                        ->get();

        // If no hero image set, use the latest image as fallback
        if (!$heroImage) {
            $heroImage = $photos->first();
        }

        return view('galeri', compact('photos', 'heroImage', 'achievementPhotos', 'galleries'));
    }
}
