@extends('layouts.app')

@section('title', 'Profil Saya - Mitra Irigasi')

@section('content')
<div class="py-8 bg-slate-50 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- HEADER PROFIL -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm mb-6 flex flex-col sm:flex-row items-center gap-6 text-center sm:text-left">
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

        <!-- NOTIFIKASI SUCCESS -->
        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-r-xl shadow-sm mb-6 text-xs sm:text-sm">
                {{ session('success') }}
            </div>
        @endif

        <!-- DATA AKUN -->
        <div class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-sm space-y-6">
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

    </div>
</div>
@endsection