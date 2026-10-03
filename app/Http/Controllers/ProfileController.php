<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // Tampilkan Halaman Profil
    public function show()
    {
        $orders = [];
        if (Auth::check()) {
            $orders = \App\Models\Order::where('user_id', Auth::id())
                ->orderBy('created_at', 'desc')
                ->get();
        }

        return view('profile', compact('orders'));
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

    // Update Password User
    public function updatePassword(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $request->validate([
            'current_password' => ['required', 'string'],
            'password'         => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'current_password.required' => 'Password saat ini wajib diisi.',
            'password.required'         => 'Password baru wajib diisi.',
            'password.min'              => 'Password baru minimal 8 karakter.',
            'password.confirmed'        => 'Konfirmasi password baru tidak cocok.',
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai.'])->withInput();
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success_password', 'Password Anda berhasil diperbarui!');
    }
}