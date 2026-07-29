<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Mitra Irigasi - Solusi Air Pertanian')</title>

    <!-- FAVICON TETES AIR WARNA BIRU -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%232563EB'><path d='M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z'/></svg>">

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
                    <div class="w-11 h-11 bg-emerald-600 rounded-xl flex items-center justify-center text-white shadow-md shadow-emerald-200 group-hover:bg-emerald-700 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 3v18m0-18C8 7 4 11 4 16b8 8 0 0016 0c0-5-4-9-8-13z" />
                        </svg>
                    </div>
                    <div>
                        <span class="text-xl font-extrabold text-slate-900 block leading-none">MITRA IRIGASI</span>
                        <!-- <span class="text-xs font-semibold text-emerald-600 tracking-wider">CV. WIJAYA KARYA</span> -->
                    </div>
                </a>

                <!-- DESKTOP MENU -->
                <div class="hidden md:flex items-center gap-7 font-semibold text-slate-600 text-sm">
                    <a href="{{ route('index') }}" class="hover:text-emerald-600 transition {{ request()->routeIs('index') ? 'text-emerald-600 font-bold' : '' }}">Beranda</a>
                    <a href="{{ route('about') }}" class="hover:text-emerald-600 transition {{ request()->routeIs('about') ? 'text-emerald-600 font-bold' : '' }}">Tentang Kami</a>
                    <a href="{{ route('katalog') }}" class="hover:text-emerald-600 transition {{ request()->routeIs('katalog') ? 'text-emerald-600 font-bold' : '' }}">Katalog Peralatan</a>
                    <a href="{{ route('chatbot') }}" class="hover:text-emerald-600 transition flex items-center gap-1.5 {{ request()->routeIs('chatbot') ? 'text-emerald-600 font-bold' : '' }}">
                        <span>Tanya Chatbot AI</span>
                    </a>
                </div>

                <!-- AUTH BUTTONS, CART ICON & USER DROPDOWN -->
                <div class="hidden md:flex items-center gap-4">
                    
                    @php
                        $cartCount = Auth::check() ? \App\Models\Cart::where('user_id', Auth::id())->count() : 0;
                    @endphp

                    <!-- ICON KERANJANG (SELALU MUNCUL DI DESKTOP) -->
                    <div x-data="{ count: {{ $cartCount }} }" 
                        @cart-updated.window="count = $event.detail.count">
                        
                        <a href="{{ route('cart.index') }}" class="relative p-2.5 text-slate-700 hover:text-emerald-600 hover:bg-slate-100 rounded-xl transition inline-block" title="Keranjang Belanja">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            
                            <!-- Circle Merah Live -->
                            <template x-if="count > 0">
                                <span x-text="count" class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] font-extrabold w-5 h-5 flex items-center justify-center rounded-full border-2 border-white shadow-sm animate-pulse"></span>
                            </template>
                        </a>
                    </div>

                    @auth
                        <!-- DROPDOWN USER PROFILE -->
                        <div x-data="{ dropdownOpen: false }" class="relative">
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

                            <!-- ISI DROPDOWN MENU -->
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

                                @if(Auth::user()->role === 'admin')
                                    <a href="/admin" class="flex items-center gap-2 px-4 py-2.5 text-slate-700 hover:bg-slate-50 hover:text-emerald-600 transition">
                                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        <a href="{{ route('login') }}" class="text-xs font-bold text-slate-700 hover:text-emerald-600 px-3 py-2">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl shadow-md shadow-emerald-200 transition">
                            Daftar Akun
                        </a>
                    @endauth
                </div>

                <!-- HAMBURGER MENU MOBILE -->
                <div class="flex md:hidden items-center gap-2">
                    <!-- ICON KERANJANG (SELALU MUNCUL DI MOBILE) -->
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
            <a href="{{ route('katalog') }}" class="block py-2 text-sm font-bold text-slate-700">Katalog Peralatan</a>
            <a href="{{ route('chatbot') }}" class="block py-2 text-sm font-bold text-slate-700">Tanya Chatbot AI</a>
            <a href="{{ route('cart.index') }}" class="block py-2 text-sm font-bold text-slate-700">Keranjang Belanja</a>
            
            @auth
                <a href="{{ route('profile') }}" class="block py-2 text-sm font-bold text-slate-700">Profil Saya</a>
                
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
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div>
                <h3 class="text-lg font-extrabold text-white mb-3">Mitra Irigasi</h3>
                <p class="text-sm text-slate-400 leading-relaxed">Penyedia peralatan dan komponen sistem irigasi pertanian modern terpercaya. Membantu petani menghemat air dan meningkatkan hasil panen.</p>
            </div>
            <div>
                <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-3">Layanan Kami</h4>
                <ul class="space-y-2 text-sm text-slate-400">
                    <li>• Sistem Irigasi Tetes (Drip)</li>
                    <li>• Sprinkler & Micro Sprayer</li>
                    <li>• Filtrasi & Otomasi Lahan</li>
                    <li>• Konsultasi Teknis Direct WA</li>
                </ul>
            </div>
            <div>
                <h4 class="text-sm font-bold text-white uppercase tracking-wider mb-3">Kontak & Lokasi</h4>
                <p class="text-sm text-slate-400 leading-relaxed">
                    <strong>WhatsApp Admin:</strong> 0821-4201-0020<br>
                    <strong>Area Layanan:</strong> Seluruh Wilayah Indonesia
                </p>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 border-t border-slate-800 pt-6 text-center text-xs text-slate-500">
            &copy; {{ date('Y') }} Mitra Irigasi - CV. Wijaya Karya. All rights reserved.
        </div>
    </footer>

</body>
</html>