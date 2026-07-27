@extends('layouts.app')

@section('title', 'Profil Saya - Mitra Irigasi')

@section('content')
<div x-data="{ isEditing: {{ $errors->any() ? 'true' : 'false' }} }" class="py-8 bg-slate-50 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- HEADER PROFIL -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm mb-6 flex flex-col sm:flex-row items-center justify-between gap-6 text-center sm:text-left">
            <div class="flex flex-col sm:flex-row items-center gap-5">
                <div class="w-20 h-20 bg-emerald-600 rounded-2xl flex items-center justify-center text-white font-extrabold text-2xl shadow-lg shadow-emerald-200 shrink-0">
                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                </div>
                <div class="space-y-1">
                    <span class="bg-emerald-50 text-emerald-700 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider border border-emerald-200">
                        Akun {{ ucfirst(Auth::user()->role ?? 'Visitor') }}
                    </span>
                    <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">
                        {{ Auth::user()->name }}
                    </h1>
                    <p class="text-slate-500 text-xs sm:text-sm">
                        {{ Auth::user()->email }} • Terdaftar sejak {{ Auth::user()->created_at ? Auth::user()->created_at->format('d M Y') : '-' }}
                    </p>
                </div>
            </div>

            <button 
                @click="isEditing = !isEditing" 
                class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs px-4 py-2.5 rounded-xl border border-slate-200 transition flex items-center gap-2 shrink-0"
            >
                <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                </svg>
                <span x-text="isEditing ? 'Batal Edit' : 'Edit Profil'"></span>
            </button>
        </div>

        <!-- NOTIFIKASI SUCCESS -->
        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-r-xl shadow-sm mb-6 text-xs sm:text-sm flex items-center gap-2">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <!-- ERROR VALIDASI -->
        @if($errors->any())
            <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-800 p-4 rounded-r-xl shadow-sm mb-6 text-xs sm:text-sm">
                <strong class="font-bold block mb-1">Gagal memperbarui profil:</strong>
                <ul class="list-disc list-inside space-y-0.5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- MODE DISPLAY DATA (NON-EDITING) -->
        <div x-show="!isEditing" x-transition class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-sm space-y-6">
            <h2 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-3">
                Informasi Pengguna
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-xs sm:text-sm">
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <span class="block text-slate-400 font-medium text-[11px] uppercase tracking-wider">Nama Lengkap</span>
                    <strong class="text-slate-800 text-sm mt-0.5 block">{{ Auth::user()->name }}</strong>
                </div>

                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <span class="block text-slate-400 font-medium text-[11px] uppercase tracking-wider">Alamat Email</span>
                    <strong class="text-slate-800 text-sm mt-0.5 block">{{ Auth::user()->email }}</strong>
                </div>

                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <span class="block text-slate-400 font-medium text-[11px] uppercase tracking-wider">No. WhatsApp / HP</span>
                    <strong class="text-slate-800 text-sm mt-0.5 block">{{ Auth::user()->phone_number ?? '-' }}</strong>
                </div>

                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100">
                    <span class="block text-slate-400 font-medium text-[11px] uppercase tracking-wider">Tujuan Kunjungan</span>
                    <strong class="text-slate-800 text-sm mt-0.5 block">{{ Auth::user()->visitor_purpose ?? '-' }}</strong>
                </div>
            </div>

            <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 text-xs sm:text-sm">
                <span class="block text-slate-400 font-medium text-[11px] uppercase tracking-wider mb-1">Alamat Lengkap / Lokasi Lahan</span>
                <p class="text-slate-800 font-semibold leading-relaxed">
                    {{ Auth::user()->address ?? 'Belum mengisi alamat lengkap.' }}
                </p>
            </div>

            <div class="pt-4 flex justify-between items-center border-t border-slate-100">
                <a href="{{ route('katalog') }}" class="text-xs font-bold text-emerald-600 hover:underline">
                    ← Kembali ke Katalog
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200 text-xs font-bold px-4 py-2 rounded-xl transition">
                        Keluar dari Akun
                    </button>
                </form>
            </div>
        </div>

        <!-- MODE FORM EDITING -->
        <div x-show="isEditing" x-transition style="display: none;" class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-sm">
            <h2 class="text-base font-bold text-slate-900 border-b border-slate-100 pb-3 mb-6">
                Edit Data Profil
            </h2>

            <form action="{{ route('profile.update') }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                    <!-- NAMA -->
                    <div>
                        <label for="name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Nama Lengkap <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name" 
                            value="{{ old('name', Auth::user()->name) }}" 
                            required 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
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
                            value="{{ old('email', Auth::user()->email) }}" 
                            required 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                        >
                    </div>

                    <!-- NO WA -->
                    <div>
                        <label for="phone_number" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            No. WhatsApp / HP <span class="text-rose-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="phone_number" 
                            id="phone_number" 
                            value="{{ old('phone_number', Auth::user()->phone_number) }}" 
                            required 
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
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
                            class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition font-medium"
                        >
                            <option value="Pesan barang" {{ old('visitor_purpose', Auth::user()->visitor_purpose) == 'Pesan barang' ? 'selected' : '' }}>Pesan Barang Peralatan</option>
                            <option value="Konsultasi teknis" {{ old('visitor_purpose', Auth::user()->visitor_purpose) == 'Konsultasi teknis' ? 'selected' : '' }}>Konsultasi Teknis Lahan</option>
                            <option value="Lain-lain" {{ old('visitor_purpose', Auth::user()->visitor_purpose) == 'Lain-lain' ? 'selected' : '' }}>Lain-lain</option>
                        </select>
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
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                    >{{ old('address', Auth::user()->address) }}</textarea>
                </div>

                <!-- TOMBOL ACTION EDIT -->
                <div class="pt-4 flex justify-end gap-3 border-t border-slate-100">
                    <button 
                        type="button" 
                        @click="isEditing = false" 
                        class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs px-5 py-3 rounded-xl transition"
                    >
                        Batal
                    </button>
                    <button 
                        type="submit" 
                        class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs px-6 py-3 rounded-xl shadow-md shadow-emerald-200 transition"
                    >
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

    </div>
</div>
@endsection