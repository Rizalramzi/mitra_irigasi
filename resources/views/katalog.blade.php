@extends('layouts.app')

@section('title', 'Katalog Produk - Mitra Irigasi')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-6 border-b pb-4">
        <h1 class="text-2xl font-bold text-gray-900">Katalog Peralatan Irigasi</h1>
        <p class="text-sm text-gray-500">Pilih barang yang Anda perlukan lalu masukkan ke keranjang untuk mengajukan penawaran harga.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @forelse($categories as $category)
        <div class="mb-10">
            <h2 class="text-xl font-bold text-blue-800 mb-4 border-l-4 border-blue-600 pl-3">
                {{ $category->name }}
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($category->products as $product)
                    <div class="bg-white border rounded-xl shadow-sm hover:shadow-md transition p-5 flex flex-col justify-between">
                        <div>
                            <h3 class="font-bold text-gray-800 text-lg mb-2">{{ $product->name }}</h3>
                            <p class="text-xs text-gray-500 mb-3 line-clamp-3">{{ $product->description }}</p>
                            <div class="bg-blue-50 text-blue-700 text-xs px-2.5 py-1 rounded inline-block font-medium">
                                Fungsi: {{ $product->function }}
                            </div>
                        </div>

                        <div class="mt-5 pt-3 border-t flex items-center justify-between">
                            <span class="text-xs text-gray-400 italic">Harga via Consultation</span>

                            @auth
                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold py-1.5 px-3 rounded-lg transition">
                                        + Keranjang
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                @empty
                    <p class="text-sm text-gray-400 col-span-3 italic">Belum ada produk di kategori ini.</p>
                @endforelse
            </div>
        </div>
    @empty
        <p class="text-center text-gray-500 py-12">Belum ada data kategori produk.</p>
    @endforelse

    @guest
        <div class="bg-amber-50 border-l-4 border-amber-500 text-amber-800 p-4 rounded-r mt-6">
            <p class="font-bold text-sm">Informasi</p>
            <p class="text-xs mt-1">Silakan <a href="{{ route('login') }}" class="underline font-semibold">Login</a> atau <a href="{{ route('register') }}" class="underline font-semibold">Daftar Akun Visitor</a> untuk memasukkan barang ke keranjang dan mengajukan pesanan ke WhatsApp Admin.</p>
        </div>
    @endguest
</div>
@endsection