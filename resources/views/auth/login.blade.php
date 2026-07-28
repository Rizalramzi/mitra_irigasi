@extends('layouts.app')

@section('title', 'Masuk Akun - Mitra Irigasi')

@section('content')
<div class="py-12 bg-slate-50 min-h-[calc(100vh-5rem)] flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full">
        
        <!-- HEADER KARTU LOGIN -->
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center text-white mx-auto shadow-lg shadow-emerald-200 mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                </svg>
            </div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                Selamat Datang Kembali
            </h1>
            <p class="text-xs sm:text-sm text-slate-500 mt-2">
                Masuk ke akun Anda untuk memilih peralatan dan mengajukan pemesanan irigasi.
            </p>
        </div>

        <!-- FORM CARD LOGIN -->
        <div class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-sm">
            
            @if($errors->any())
                <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-800 p-4 rounded-r-xl text-xs sm:text-sm mb-6">
                    <p class="font-bold">Gagal Masuk</p>
                    <ul class="list-disc list-inside mt-1 space-y-0.5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-5">
                @csrf

                <!-- EMAIL -->
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Alamat Email
                    </label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}" 
                        required 
                        placeholder="contoh: budi@gmail.com" 
                        class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                    >
                </div>

                <!-- PASSWORD DENGAN SHOW/HIDE -->
                <div x-data="{ show: false }">
                    <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Kata Sandi / Password
                    </label>
                    <div class="relative">
                        <input 
                            :type="show ? 'text' : 'password'" 
                            name="password" 
                            id="password" 
                            required 
                            placeholder="••••••••" 
                            class="w-full pl-4 pr-11 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                        >
                        <button 
                            type="button" 
                            @click="show = !show" 
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-emerald-600 focus:outline-none transition"
                            title="Tampilkan/Sembunyikan Password"
                        >
                            <!-- Icon Mata Terbuka -->
                            <svg x-show="show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <!-- Icon Mata Tertutup -->
                            <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858-5.908a10.03 10.03 0 013.682-.863c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m-4.692-4.692a3 3 0 00-4.243-4.243" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- INGAT SAYA (REMEMBER ME) -->
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="remember" class="w-4 h-4 text-emerald-600 rounded border-slate-300 focus:ring-emerald-500">
                        <span class="ml-2 text-xs font-semibold text-slate-600">Ingat Saya di Perangkat Ini</span>
                    </label>
                </div>

                <!-- TOMBOL LOGIN -->
                <button 
                    type="submit" 
                    class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm py-3.5 px-4 rounded-xl shadow-md shadow-emerald-200 transition flex items-center justify-center gap-2"
                >
                    <span>Masuk ke Akun</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>
            </form>

            <!-- FOOTER REGISTER LINK -->
            <div class="mt-8 pt-6 border-t border-slate-100 text-center">
                <p class="text-xs text-slate-500">
                    Belum memiliki akun Visitor? 
                    <a href="{{ route('register') }}" class="font-bold text-emerald-600 hover:underline">
                        Daftar Akun Baru
                    </a>
                </p>
            </div>

        </div>

    </div>
</div>
@endsection