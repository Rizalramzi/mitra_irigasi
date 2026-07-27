<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // Tampilkan Halaman Profil
    public function show()
    {
        return view('profile');
    }

    // Update Data Profil User
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'            => ['required', 'string', 'max:255'],
            'email'           => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone_number'    => ['required', 'string', 'max:20'],
            'visitor_purpose' => ['required', 'string', 'max:255'],
            'address'         => ['required', 'string', 'max:1000'],
        ], [
            'name.required'            => 'Nama lengkap wajib diisi.',
            'email.required'           => 'Alamat email wajib diisi.',
            'email.unique'             => 'Email tersebut sudah digunakan oleh akun lain.',
            'phone_number.required'    => 'Nomor WhatsApp wajib diisi.',
            'visitor_purpose.required' => 'Tujuan kunjungan wajib dipilih.',
            'address.required'         => 'Alamat lengkap wajib diisi.',
        ]);

        $user->update($validated);

        return back()->with('success', 'Data profil Anda berhasil diperbarui!');
    }
}