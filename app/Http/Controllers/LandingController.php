<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Message;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        // Hero images (is_hero = true, any category)
        $heroes = Gallery::where('is_hero', true)->get();

        // Ambil gambar prestasi untuk slider card
        $prestasi = Gallery::where('category', 'prestasi')->get();

        // Ambil gambar About Us
        $aboutImages = Gallery::where('category', 'about')->get();

        // Ambil gambar Our Moments (gallery biasa)
        $moments = Gallery::where('category', 'moments')->get();

        // Messages - skip dulu (array kosong)
        $messages = collect();

        return view('landing', compact('heroes', 'prestasi', 'aboutImages', 'moments', 'messages'));
    }
}
