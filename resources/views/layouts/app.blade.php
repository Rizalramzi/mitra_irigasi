<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Mitra Irigasi - Solusi Air Pertanian')</title>

    <!-- FAVICON / ICON TAB BROWSER -->
    <!-- Option A: Menggunakan SVG Tetes Air SVG / Leaf Icon -->
    <!-- FAVICON / ICON TAB BROWSER (TETES AIR WARNA BIRU) -->
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%232563EB'><path d='M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z'/></svg>">
    
    <!-- Option B: Jika kamu punya file favicon sendiri di folder public (misal: public/favicon.ico / favicon.png) -->
    <!-- <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon"> -->

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- TAILWIND & VITE (MENGGUNAKAN INSTALLAN LOKAL) -->
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
                <span>Layanan Konsultasi & Peralatan Irigasi CV. Wijaya Karya</span>
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
                        <span class="text-xs font-semibold text-emerald-600 tracking-wider">CV. WIJAYA KARYA</span>
                    </div>
                </a>

                <!-- DESKTOP MENU (PUBLIK BISA AKSES CHATBOT & TENTANG KAMI) -->
                <div class="hidden md:flex items-center gap-7 font-semibold text-slate-600 text-sm">
                    <a href="{{ route('index') }}" class="hover:text-emerald-600 transition {{ request()->routeIs('index') ? 'text-emerald-600 font-bold' : '' }}">Beranda</a>
                    
                    <a href="{{ route('about') }}" class="hover:text-emerald-600 transition {{ request()->routeIs('about') ? 'text-emerald-600 font-bold' : '' }}">Tentang Kami</a>

                    <a href="{{ route('katalog') }}" class="hover:text-emerald-600 transition {{ request()->routeIs('katalog') ? 'text-emerald-600 font-bold' : '' }}">Katalog Peralatan</a>
                    
                    <!-- MENU CHATBOT AI (Tampil untuk Guest & Auth) -->
                    <a href="{{ route('chatbot') }}" class="hover:text-emerald-600 transition flex items-center gap-1.5 {{ request()->routeIs('chatbot') ? 'text-emerald-600 font-bold' : '' }}">
                        <span>Tanya Chatbot AI</span>
                    </a>


                    @auth
                        <a href="{{ route('cart.index') }}" class="relative hover:text-emerald-600 transition flex items-center gap-2 bg-slate-100 px-3.5 py-2 rounded-lg">
                            <svg class="w-4 h-4 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                            </svg>
                            <span>Keranjang</span>
                            @php $cartCount = count(session('cart', [])); @endphp
                            @if($cartCount > 0)
                                <span class="bg-red-500 text-white text-xs font-black px-2 py-0.5 rounded-full">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                    @endauth
                </div>

                <!-- AUTH BUTTONS / USER PROFILE -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <div class="text-right">
                            <span class="block text-[11px] text-slate-400 font-medium">Selamat Datang</span>
                            <span class="block text-xs font-bold text-slate-800">{{ Auth::user()->name }}</span>
                        </div>

                        @if(Auth::user()->role === 'admin')
                            <a href="/admin" class="bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold px-3.5 py-2 rounded-lg transition">
                                Panel Admin
                            </a>
                        @endif

                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-rose-50 hover:bg-rose-100 text-rose-600 border border-rose-200 text-xs font-bold px-3.5 py-2 rounded-lg transition">
                                Keluar
                            </button>
                        </form>
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
            <a href="{{ route('katalog') }}" class="block py-2 text-sm font-bold text-slate-700">Katalog Peralatan</a>
            <a href="{{ route('chatbot') }}" class="block py-2 text-sm font-bold text-slate-700">Tanya Chatbot AI</a>
            <a href="{{ route('about') }}" class="block py-2 text-sm font-bold text-slate-700">Tentang Kami</a>
            
            @auth
                <a href="{{ route('cart.index') }}" class="block py-2 text-sm font-bold text-slate-700">Keranjang Belanja ({{ count(session('cart', [])) }})</a>
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
                <h3 class="text-lg font-extrabold text-white mb-3">CV. WIJAYA KARYA</h3>
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