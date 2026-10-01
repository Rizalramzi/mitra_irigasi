<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Mitra Irigasi - Solusi Air Pertanian')</title>

    <!-- FAVICON -->
    <link rel="icon" type="image/png" href="{{ asset('storage/logo_mitra_irigasi.png') }}">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- TAILWIND & VITE (LOKAL) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen antialiased">

    <!-- TOP BAR RINGKAS -->
    <div class="bg-emerald-900 text-emerald-100 text-xs sm:text-sm py-2 px-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span>Layanan Konsultasi & Peralatan Irigasi Mitra Irigasi</span>
            </div>
            <div class="hidden sm:flex items-center gap-4 text-xs font-medium">
                <span>Hubungi Admin: <strong>0821-4201-0020</strong></span>
            </div>
        </div>
    </div>

    <!-- NAVBAR UTAMA TERPUSAT -->
    <nav x-data="{ open: false }" class="bg-white border-b border-slate-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                
                <!-- BRAND / LOGO -->
                <a href="{{ route('index') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('storage/logo_mitra_irigasi.png') }}" alt="Mitra Irigasi Logo" class="w-12 h-12 object-contain group-hover:scale-105 transition-transform duration-200">
                    <div>
                        <span class="text-xl font-extrabold text-slate-900 block leading-none">MITRA IRIGASI</span>
                    </div>
                </a>

                <!-- DESKTOP MENU -->
                <div class="hidden md:flex items-center gap-7 font-semibold text-slate-600 text-sm">
                    <a href="{{ route('index') }}" class="hover:text-emerald-600 transition {{ request()->routeIs('index') ? 'text-emerald-600 font-bold' : '' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="hover:text-emerald-600 transition {{ request()->routeIs('about') ? 'text-emerald-600 font-bold' : '' }}">Tentang Kami</a>
                    
                    <!-- DROPDOWN KATALOG PERALATAN (DESKTOP) -->
                    <div x-data="{ catalogDropdown: false }" class="relative cursor-pointer" @mouseleave="catalogDropdown = false">
                        <button 
                            @click="catalogDropdown = !catalogDropdown" 
                            @mouseover="catalogDropdown = true"
                            class="flex items-center gap-1 hover:text-emerald-600 transition focus:outline-none py-2 {{ request()->routeIs('katalog') || request()->routeIs('guide') ? 'text-emerald-600 font-bold' : '' }}"
                        >
                            <span>Katalog Peralatan</span>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="catalogDropdown ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>

                        <div 
                            x-show="catalogDropdown" 
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="transform opacity-0 scale-95 -translate-y-2"
                            x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-100"
                            x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
                            x-transition:leave-end="transform opacity-0 scale-95 -translate-y-2"
                            class="absolute left-0 mt-1 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 text-xs font-semibold space-y-1"
                            style="display: none;"
                        >
                            <a href="{{ route('katalog') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-slate-700 hover:bg-slate-50 hover:text-emerald-600 transition {{ request()->routeIs('katalog') ? 'text-emerald-600 font-bold bg-emerald-50/50' : '' }}">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                <div>
                                    <span class="block">Produk</span>
                                    <span class="text-[10px] font-normal text-slate-400">Komponen & alat pengairan</span>
                                </div>
                            </a>

                            <a href="{{ route('guide') }}" class="flex items-center gap-2.5 px-4 py-2.5 text-slate-700 hover:bg-slate-50 hover:text-emerald-600 transition {{ request()->routeIs('guide') ? 'text-emerald-600 font-bold bg-emerald-50/50' : '' }}">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <span class="block">Panduan</span>
                                    <span class="text-[10px] font-normal text-slate-400">Video tutorial & edukasi</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('chatbot') }}" class="hover:text-emerald-600 transition flex items-center gap-1.5 {{ request()->routeIs('chatbot') ? 'text-emerald-600 font-bold' : '' }}">
                        <span>Tanya Chatbot AI</span>
                    </a>
                    <a href="{{ route('orders.track') }}" class="hover:text-emerald-600 transition flex items-center gap-1.5 {{ request()->routeIs('orders.track') ? 'text-emerald-600 font-bold' : '' }}">
                        <span>Lacak Pesanan</span>
                    </a>
                </div>

                <!-- AUTH BUTTONS, CART ICON & USER DROPDOWN -->
                <div class="hidden md:flex items-center gap-4">
                    
                    @php
                        $cartCount = Auth::check() ? \App\Models\Cart::where('user_id', Auth::id())->count() : 0;
                    @endphp

                    <!-- ICON KERANJANG -->
                    <div x-data="{ count: {{ $cartCount }} }" @cart-updated.window="count = $event.detail.count">
                        <a href="{{ route('cart.index') }}" class="relative p-2.5 text-slate-700 hover:text-emerald-600 hover:bg-slate-100 rounded-xl transition inline-block" title="Keranjang Belanja">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <template x-if="count > 0">
                                <span x-text="count" class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-extrabold w-5 h-5 flex items-center justify-center rounded-full border-2 border-white shadow-sm animate-pulse"></span>
                            </template>
                        </a>
                    </div>

                    @auth
                        <!-- DROPDOWN USER PROFILE -->
                        <div x-data="{ dropdownOpen: false }" class="relative cursor-pointer">
                            <button @click="dropdownOpen = !dropdownOpen" @click.away="dropdownOpen = false" class="flex items-center gap-2.5 p-1.5 rounded-xl hover:bg-slate-100 transition focus:outline-none">
                                <div class="w-9 h-9 bg-emerald-600 text-white rounded-lg flex items-center justify-center font-extrabold text-xs shadow-sm">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                </div>
                                <div class="text-left">
                                    <span class="block text-[10px] text-slate-400 font-medium leading-none">Selamat Datang</span>
                                    <span class="block md:flex text-xs font-bold text-slate-800 mt-0.5 items-center gap-1">
                                        {{ Auth::user()->name }}
                                        <svg class="w-3 h-3 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </span>
                                </div>
                            </button>

                            <div x-show="dropdownOpen" 
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-slate-100 py-2 z-50 text-xs font-medium space-y-1"
                                 style="display: none;">
                                
                                <div class="px-4 py-2 border-b border-slate-100">
                                    <span class="block font-bold text-slate-900">{{ Auth::user()->name }}</span>
                                    <span class="block text-[11px] text-slate-400 truncate">{{ Auth::user()->email }}</span>
                                </div>

                                <a href="{{ route('profile') }}" class="flex items-center gap-2 px-4 py-2.5 text-slate-700 hover:bg-slate-50 hover:text-emerald-600 transition">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <span>Profil Saya</span>
                                </a>

                                <a href="{{ route('orders.track') }}" class="flex items-center gap-2 px-4 py-2.5 text-slate-700 hover:bg-slate-50 hover:text-emerald-600 transition">
                                    <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                                    </svg>
                                    <span>Lacak Pesanan</span>
                                </a>

                                @if(Auth::user()->isAdmin())
                                    <a href="/admin" class="flex items-center gap-2 px-4 py-2.5 text-slate-700 hover:bg-slate-50 hover:text-emerald-600 transition font-bold">
                                        <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span>Panel Admin</span>
                                    </a>
                                @endif

                                <div class="border-t border-slate-100 pt-1">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2.5 text-rose-600 hover:bg-rose-50 transition font-bold">
                                            <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                            </svg>
                                            <span>Keluar</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-xs font-bold text-slate-700 hover:text-emerald-600 px-3 py-2">Masuk</a>
                        <a href="{{ route('register') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-md shadow-emerald-200 transition">Daftar Akun</a>
                    @endauth
                </div>

                <!-- HAMBURGER MENU MOBILE -->
                <div class="flex md:hidden items-center gap-2">
                    <a href="{{ route('cart.index') }}" class="relative p-2 text-slate-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                        </svg>
                        @if($cartCount > 0)
                            <span class="absolute top-0 right-0 bg-red-500 text-white text-[9px] font-extrabold w-4 h-4 flex items-center justify-center rounded-full">
                                {{ $cartCount }}
                            </span>
                        @endif
                    </a>

                    <button @click="open = !open" class="text-slate-600 p-2 rounded-lg bg-slate-100 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- MOBILE NAVIGATION -->
        <div x-show="open" class="md:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-3">
            <a href="{{ route('index') }}" class="block py-2 text-sm font-bold text-slate-700">Beranda</a>
            <a href="{{ route('about') }}" class="block py-2 text-sm font-bold text-slate-700">Tentang Kami</a>
            
            <!-- DROPDOWN MOBILE KATALOG -->
            <div x-data="{ mobileCatalog: false }" class="space-y-1">
                <button @click="mobileCatalog = !mobileCatalog" class="w-full flex items-center justify-between py-2 text-sm font-bold text-slate-700">
                    <span>Katalog Peralatan</span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="mobileCatalog ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div x-show="mobileCatalog" class="pl-4 space-y-2 border-l-2 border-emerald-500 my-1">
                    <a href="{{ route('katalog') }}" class="block py-1.5 text-xs font-semibold text-slate-600 hover:text-emerald-600">• Produk</a>
                    <a href="{{ route('guide') }}" class="block py-1.5 text-xs font-semibold text-slate-600 hover:text-emerald-600">• Panduan</a>
                </div>
            </div>

            <a href="{{ route('chatbot') }}" class="block py-2 text-sm font-bold text-slate-700">Tanya Chatbot AI</a>
            <a href="{{ route('orders.track') }}" class="block py-2 text-sm font-bold text-slate-700">Lacak Pesanan</a>
            <a href="{{ route('cart.index') }}" class="block py-2 text-sm font-bold text-slate-700">Keranjang Belanja</a>
            
            @auth
                <a href="{{ route('profile') }}" class="block py-2 text-sm font-bold text-slate-700">Profil Saya</a>
                @if(Auth::user()->isAdmin())
                    <a href="/admin" class="block py-2 text-sm font-bold text-emerald-600">⚙️ Panel Admin</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="pt-2">
                    @csrf
                    <button type="submit" class="w-full text-center bg-rose-600 text-white py-2.5 rounded-lg font-bold text-sm">Keluar Akun</button>
                </form>
            @else
                <div class="grid grid-cols-2 gap-2 pt-2">
                    <a href="{{ route('login') }}" class="text-center bg-slate-100 text-slate-700 py-2.5 rounded-lg font-bold text-sm">Masuk</a>
                    <a href="{{ route('register') }}" class="text-center bg-emerald-600 text-white py-2.5 rounded-lg font-bold text-sm">Daftar</a>
                </div>
            @endauth
        </div>
    </nav>

    <!-- CONTENT -->
    <main class="grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-900 text-slate-300 pt-12 pb-8 mt-16 border-t-4 border-emerald-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
            <div class="space-y-3">
                <div class="flex items-center gap-2">
                    <img src="{{ asset('storage/logo_mitra_irigasi.png') }}" alt="Logo Mitra Irigasi" class="w-8 h-8 object-contain">
                    <h3 class="text-lg font-extrabold text-white">Mitra Irigasi</h3>
                </div>
                <p class="text-xs text-slate-400 leading-relaxed">Penyedia peralatan dan komponen sistem irigasi pertanian modern terpercaya. Membantu petani menghemat air, efisiensi tenaga kerja, dan meningkatkan hasil panen.</p>
            </div>

            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-3">Layanan Kami</h4>
                <ul class="space-y-2 text-xs text-slate-400">
                    <li>• Sistem Irigasi Tetes (Drip)</li>
                    <li>• Sprinkler & Micro Sprayer</li>
                    <li>• Solenoid Valve & Controller</li>
                    <li>• Filtrasi & Otomasi Lahan</li>
                    <li>• Konsultasi Teknis Direct WA</li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-3">Sosial Media</h4>
                <div class="space-y-2 text-xs">
                    <a href="https://wa.me/6282142010020" target="_blank" class="flex items-center gap-2 text-slate-400 hover:text-emerald-400 transition">
                        <svg class="w-4 h-4 fill-current text-emerald-500" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                        <span>WhatsApp: 0821-4201-0020</span>
                    </a>
                    <a href="https://www.tiktok.com/@mitrairigasi" target="_blank" class="flex items-center gap-2 text-slate-400 hover:text-white transition">
                        <svg class="w-4 h-4 fill-current text-slate-200" viewBox="0 0 24 24">
                            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.97-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.29-2.63.74-5.26 2.72-6.99 1.34-1.17 3.07-1.83 4.85-1.84.28 0 .56.02.84.05v4.06c-.46-.08-.93-.11-1.4-.07-1.04.09-2.06.6-2.67 1.45-.66.92-.85 2.14-.52 3.22.31 1.07 1.2 1.93 2.29 2.21.96.25 2.02.09 2.87-.45.92-.58 1.48-1.61 1.52-2.7.04-3.6.01-7.2.02-10.8z"/>
                        </svg>
                        <span>TikTok: @mitrairigasi</span>
                    </a>
                    <a href="https://www.instagram.com/mitrairigasi" target="_blank" class="flex items-center gap-2 text-slate-400 hover:text-pink-400 transition">
                        <svg class="w-4 h-4 fill-current text-rose-400" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                        <span>Instagram: @mitrairigasi</span>
                    </a>
                </div>
            </div>

            <div>
                <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-3">Kontak & Lokasi</h4>
                <p class="text-xs text-slate-400 leading-relaxed">
                    <strong>WhatsApp Admin:</strong> 0821-4201-0020<br>
                    <strong>Email:</strong> mitrairigasi.id@gmail.com<br>
                    <strong>Area Layanan:</strong> Seluruh Indonesia
                </p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 border-t border-slate-800 pt-6 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} Mitra Irigasi. All rights reserved.
        </div>
    </footer>

</body>
</html>