<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index()
    {
        return response()->json(Note::latest()->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'note' => ['required', 'string', 'min:1'],
        ]);

        $note = Note::create([
            'name' => 'Anonymous',
            'note' => $validated['note'],
        ]);

        if ($request->expectsJson() || $request->is('api/*')) {
            return response()->json($note, 201);
        }

        return redirect('/#notes')->with('success', 'Your note has been submitted successfully!');
    }
}
