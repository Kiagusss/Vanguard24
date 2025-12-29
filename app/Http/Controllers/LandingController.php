<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Note;
use App\Models\Schedule;
use App\Models\Birthday;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LandingController extends Controller
{
    public function index()
    {
        // Ambil semua galleries untuk gallery section
        $galleries = Gallery::latest()->get();

        // Ambil gambar About Us untuk section about
        $aboutPhotos = Gallery::where('category', 'about')->latest()->get();

        // Notes - tampilkan semua notes saat initial load
        $notes = Note::latest()->get();

        // Schedules langsung dari database
        $schedules = Schedule::orderBy('day')
            ->orderBy('time')
            ->get();

        // Birthdays: hitung next occurrence (tanpa peduli tahun input)
        $today = Carbon::today();
        $birthdays = Birthday::all()
            ->map(function ($birthday) use ($today) {
                $base = Carbon::parse($birthday->date);
                $next = Carbon::create($today->year, $base->month, $base->day);
                if ($next->lt($today)) {
                    $next->addYear();
                }

                return [
                    'name' => $birthday->name,
                    'date' => $birthday->date->format('Y-m-d'),
                    'next_occurrence' => $next->format('Y-m-d'),
                    'display' => $next->format('d F'),
                    'month' => $next->month,
                    'year' => $next->year,
                ];
            })
            ->sortBy('next_occurrence')
            ->values();

        return view('landing', compact('galleries', 'aboutPhotos', 'notes', 'schedules', 'birthdays'));
    }
}
