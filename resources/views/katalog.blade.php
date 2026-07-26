@extends('layouts.app')

@section('title', 'Katalog Peralatan Irigasi - Mitra Irigasi')

@section('content')
<div x-data="{ search: '', activeCategory: 'all' }" class="py-8 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- BREADCRUMB & HEADER SECTION -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 shadow-sm mb-8">
            <div class="max-w-3xl">
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block mb-1">
                    Peralatan Irigasi Lahan & Kebun
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Katalog Komponen Pengairan
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-2 leading-relaxed">
                    Pilih komponen irigasi yang Anda perlukan, tambahkan ke keranjang, lalu ajukan draf penawaran harga secara cepat via WhatsApp Admin CV. Wijaya Karya.
                </p>
            </div>

            <!-- SEARCH BAR & FILTER CATEGORY (WRAP DINAMIS KE BAWAH) -->
            <div class="mt-6 pt-6 border-t border-slate-100 flex flex-col gap-4">
                
                <!-- Search Box (Full Width di Atas / Samping Filter) -->
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </span>
                    <input 
                        type="text" 
                        x-model="search" 
                        placeholder="Cari nama alat (misal: Sprinkler, PE, Filter)..." 
                        class="w-full pl-10 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                    >
                </div>

                <!-- Category Filter Buttons (Flex-Wrap Dinamis Memanjang ke Bawah) -->
                <div class="flex flex-wrap items-center gap-2 pt-1">
                    <button 
                        @click="activeCategory = 'all'" 
                        :class="activeCategory === 'all' ? 'bg-emerald-600 text-white font-bold shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'"
                        class="px-4 py-2.5 rounded-xl text-xs transition"
                    >
                        Semua Produk
                    </button>

                    @foreach($categories as $category)
                        <button 
                            @click="activeCategory = 'cat-{{ $category->id }}'" 
                            :class="activeCategory === 'cat-{{ $category->id }}' ? 'bg-emerald-600 text-white font-bold shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'"
                            class="px-4 py-2.5 rounded-xl text-xs transition"
                        >
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>

            </div>
        </div>

        <!-- ALERT SUCCESS / ERROR -->
        @if(session('success'))
            <div class="bg-emerald-50 border-l-4 border-emerald-500 text-emerald-800 p-4 rounded-r-xl shadow-sm mb-6 flex items-center justify-between text-xs sm:text-sm">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
                <a href="{{ route('cart.index') }}" class="font-bold underline text-emerald-700 hover:text-emerald-900">
                    Buka Keranjang →
                </a>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-800 p-4 rounded-r-xl shadow-sm mb-6 text-xs sm:text-sm">
                {{ session('error') }}
            </div>
        @endif

        <!-- DAFTAR KATEGORI & PRODUK -->
        @forelse($categories as $category)
            <div 
                x-show="activeCategory === 'all' || activeCategory === 'cat-{{ $category->id }}'"
                x-transition
                class="mb-12"
            >
                <!-- Category Heading -->
                <div class="flex items-center gap-3 mb-6">
                    <span class="w-2.5 h-7 bg-emerald-600 rounded-full"></span>
                    <h2 class="text-xl font-extrabold text-slate-800 tracking-tight">
                        {{ $category->name }}
                    </h2>
                    <span class="bg-slate-200 text-slate-700 text-[11px] font-bold px-2.5 py-0.5 rounded-full">
                        {{ $category->products->count() }} Item
                    </span>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($category->products as $product)
                        <div 
                            x-show="search === '' || '{{ strtolower($product->name) }}'.includes(search.toLowerCase()) || '{{ strtolower($product->function) }}'.includes(search.toLowerCase())"
                            class="bg-white rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition flex flex-col justify-between overflow-hidden group"
                        >
                            <div class="p-5">
                                <!-- Top Info Badge -->
                                <div class="flex justify-between items-start mb-3">
                                    <span class="bg-emerald-50 text-emerald-700 border border-emerald-200 text-[10px] font-bold px-2.5 py-1 rounded-md uppercase tracking-wider">
                                        Komponen Irigasi
                                    </span>
                                    <span class="text-[11px] font-medium text-slate-400 italic">
                                        Negotiable WA
                                    </span>
                                </div>

                                <!-- Title & Description -->
                                <h3 class="font-bold text-slate-900 text-base mb-2 group-hover:text-emerald-600 transition leading-snug">
                                    {{ $product->name }}
                                </h3>
                                <p class="text-slate-500 text-xs line-clamp-3 mb-4 leading-relaxed">
                                    {{ $product->description }}
                                </p>

                                <!-- Function Box -->
                                <div class="bg-slate-50 rounded-xl p-3 border border-slate-100">
                                    <span class="block text-[10px] font-bold uppercase text-slate-400 tracking-wider mb-0.5">
                                        Fungsi Utama:
                                    </span>
                                    <span class="text-xs font-semibold text-slate-700 block">
                                        {{ $product->function }}
                                    </span>
                                </div>
                            </div>

                            <!-- Footer Card Action -->
                            <div class="px-5 py-3.5 bg-slate-50 border-t border-slate-100 flex items-center justify-between">
                                <div>
                                    <span class="block text-[10px] text-slate-400 font-medium">Harga Penawaran</span>
                                    <span class="text-xs font-bold text-emerald-700">Tanya via Admin</span>
                                </div>

                                @auth
                                    <form action="{{ route('cart.add', $product) }}" method="POST">
                                        @csrf
                                        <button 
                                            type="submit" 
                                            class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs py-2 px-3.5 rounded-xl shadow-sm shadow-emerald-200 transition flex items-center gap-1.5"
                                        >
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            <span>Keranjang</span>
                                        </button>
                                    </form>
                                @else
                                    <a 
                                        href="{{ route('login') }}" 
                                        class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs py-2 px-3 rounded-xl transition"
                                    >
                                        Login Dulu
                                    </a>
                                @endauth
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full bg-white p-8 rounded-2xl border border-slate-200 text-center">
                            <p class="text-slate-400 text-sm italic">Belum ada produk untuk kategori ini.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        @empty
            <div class="bg-white p-12 rounded-2xl border border-slate-200 text-center">
                <p class="text-slate-500 font-medium text-sm">Belum ada data kategori & produk katalog yang tersedia.</p>
            </div>
        @endforelse

        <!-- INFO BANNER JIKA USER BELUM LOGIN -->
        @guest
            <div class="mt-8 bg-emerald-900 text-white rounded-2xl p-6 sm:p-8 flex flex-col sm:flex-row items-center justify-between gap-6 shadow-xl">
                <div>
                    <h3 class="text-lg font-bold">Ingin Mengajukan Pemesanan Produk?</h3>
                    <p class="text-emerald-200 text-xs sm:text-sm mt-1">Silakan masuk atau mendaftar akun visitor terlebih dahulu untuk memilih barang dan mengirimkan draf ke WhatsApp.</p>
                </div>
                <div class="flex items-center gap-3 shrink-0">
                    <a href="{{ route('login') }}" class="bg-white text-emerald-900 font-bold text-xs px-4 py-2.5 rounded-xl hover:bg-emerald-100 transition">
                        Masuk Akun
                    </a>
                    <a href="{{ route('register') }}" class="bg-emerald-600 text-white font-bold text-xs px-4 py-2.5 rounded-xl hover:bg-emerald-700 transition border border-emerald-500">
                        Daftar Baru
                    </a>
                </div>
            </div>
        @endguest

    </div>
</div>
@endsection