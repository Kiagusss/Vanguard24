<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        $message = Message::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim!'
        ]);
    }

    public function getMessages()
    {
        $messages = Message::latest()->get(); // ambil semua pesan, bukan cuma 3
        return response()->json($messages);
    }
}
