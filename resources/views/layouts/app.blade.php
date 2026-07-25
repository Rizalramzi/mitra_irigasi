<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mitra Irigasi - CV. Wijaya Karya')</title>
    <!-- Tailwind CSS via CDN (atau bisa pakai @vite(['resources/css/app.css'])) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- ================= NAVBAR TERPUSAT ================= -->
    <nav class="bg-white border-b border-gray-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                
                <!-- Logo / Brand -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('index') }}" class="text-xl font-bold text-blue-600 tracking-wide">
                        Mitra Irigasi
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden md:flex space-x-6">
                    <a href="{{ route('index') }}" class="text-gray-600 hover:text-blue-600 font-medium">Home</a>
                    <a href="{{ route('index') }}" class="text-gray-600 hover:text-blue-600 font-medium">About</a>
                    <a href="{{ route('index') }}" class="text-gray-600 hover:text-blue-600 font-medium">Products</a>
                    <a href="{{ route('chatbot') }}" class="text-gray-600 hover:text-blue-600 font-medium">Consultation</a>
                </div>

                <!-- User Profile / Auth Action -->
                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-sm text-gray-600 font-medium">
                            Halo, <strong class="text-gray-900">{{ Auth::user()->name }}</strong>
                        </span>

                        @if(Auth::user()->role === 'admin')
                            <a href="/admin" class="bg-purple-600 hover:bg-purple-700 text-white text-xs font-semibold px-3 py-1.5 rounded-md">
                                Dashboard Admin
                            </a>
                        @endif

                        <!-- Form Logout -->
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-xs font-semibold px-3 py-1.5 rounded-md transition">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-medium text-gray-600 hover:text-blue-600 px-3 py-1.5">
                            Masuk
                        </a>
                        <a href="{{ route('register') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-3 py-1.5 rounded-md transition">
                            Daftar
                        </a>
                    @endauth
                </div>

            </div>
        </div>
    </nav>

    <!-- ================= KONTEN HALAMAN (DYNAMIC) ================= -->
    <main class="grow">
        @yield('content')
    </main>

    <!-- ================= FOOTER TERPUSAT ================= -->
    <footer class="bg-gray-800 text-gray-300 py-6 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center text-sm">
            <p class="font-semibold text-white">CV. Wijaya Karya — Mitra Irigasi</p>
            <p class="mt-1 text-gray-400">Penyedia Sistem & Komponen Irigasi Pertanian Terpercaya.</p>
            <p class="mt-4 text-xs text-gray-500">&copy; {{ date('Y') }} Mitra Irigasi. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>