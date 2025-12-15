<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validasi data form
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'message' => 'required|string|max:1000',
        ]);

        // Contoh: simpan ke log / kirim email (nanti bisa dikembangkan)
        \Log::info('Feedback diterima:', $request->only('name', 'email', 'message'));

        // Redirect balik dengan pesan sukses
        return back()->with('success', 'Terima kasih! Pesan kamu sudah terkirim.');
    }
}