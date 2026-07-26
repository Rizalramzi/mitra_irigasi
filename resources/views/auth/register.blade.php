@extends('layouts.app')

@section('title', 'Pendaftaran Akun Visitor - Mitra Irigasi')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full">
        
        <!-- HEADER KARTU REGISTER -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center text-white mx-auto shadow-lg shadow-emerald-200 mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Pendaftaran Akun Visitor
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-2">
                Isi data diri Anda dengan benar untuk kemudahan konfirmasi pesanan irigasi via WhatsApp.
            </p>
        </div>

        <!-- FORM CARD REGISTER -->
        <div class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-10 shadow-sm">
            
            @if($errors->any())
                <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-800 p-4 rounded-r-xl text-xs sm:text-sm mb-6">
                    <p class="font-bold">Pendaftaran Gagal</p>
                    <ul class="list-disc list-inside mt-1 space-y-0.5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <!-- NAMA LENGKAP -->
                    <div>
                        <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Nama Lengkap <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name') }}" 
                            required 
                            placeholder="contoh: Budi Santoso" 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                        >
                    </div>

                    <!-- EMAIL -->
                    <div>
                        <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Alamat Email <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            value="{{ old('email') }}" 
                            required 
                            placeholder="budi@gmail.com" 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                        >
                    </div>

                    <!-- NO TELEPON / WA -->
                    <div>
                        <label for="phone_number" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            No. WhatsApp / HP <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="phone_number" 
                            id="phone_number" 
                            value="{{ old('phone_number') }}" 
                            required 
                            placeholder="081234567890" 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                        >
                    </div>

                    <!-- TUJUAN KUNJUNGAN -->
                    <div>
                        <label for="visitor_purpose" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Tujuan Kunjungan <span class="text-rose-500">*</span>
                        </label>
                        <select 
                            name="visitor_purpose" 
                            id="visitor_purpose" 
                            required 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition font-medium"
                        >
                            <option value="">-- Pilih Tujuan --</option>
                            <option value="Pesan barang" {{ old('visitor_purpose') == 'Pesan barang' ? 'selected' : '' }}>Pesan Barang Peralatan</option>
                            <option value="Konsultasi teknis" {{ old('visitor_purpose') == 'Konsultasi teknis' ? 'selected' : '' }}>Konsultasi Teknis Lahan</option>
                            <option value="Lain-lain" {{ old('visitor_purpose') == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                        </select>
                    </div>

                    <!-- PASSWORD -->
                    <div>
                        <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Password (Min 8 Karakter) <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            required 
                            placeholder="••••••••" 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                        >
                    </div>

                    <!-- KONFIRMASI PASSWORD -->
                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Ulangi Password <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            required 
                            placeholder="••••••••" 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                        >
                    </div>

                </div>

                <!-- ALAMAT LENGKAP -->
                <div>
                    <label for="address" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Alamat Lengkap / Lokasi Lahan <span class="text-rose-500">*</span>
                    </label>
                    <textarea 
                        name="address" 
                        id="address" 
                        rows="3" 
                        required 
                        placeholder="Masukkan desa, kecamatan, dan kabupaten/kota lokasi Anda..." 
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                    >{{ old('address') }}</textarea>
                </div>

                <!-- TOMBOL REGISTER -->
                <button 
                    type="submit" 
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm py-3.5 px-4 rounded-xl shadow-md shadow-emerald-200 transition flex items-center justify-center gap-2"
                >
                    <span>Daftar Akun Sekarang</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </form>

            <!-- FOOTER LOGIN LINK -->
            <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                <p class="text-xs text-slate-500">
                    Sudah memiliki akun? 
                    <a href="{{ route('login') }}" class="font-bold text-emerald-600 hover:underline">
                        Masuk di Sini
                    </a>
                </p>
            </div>

        </div>

    </div>
</div>
@endsection