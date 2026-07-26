@extends('layouts.app')

@section('title', 'Keranjang Belanja - Mitra Irigasi')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold text-gray-900 mb-6 border-b pb-3">Keranjang Belanja Anda</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6 text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <div class="bg-white rounded-xl shadow-sm border overflow-hidden mb-6">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Produk</th>
                        <th class="px-6 py-3 text-center">Jumlah</th>
                        <th class="px-6 py-3 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($cart as $id => $item)
                        <tr>
                            <td class="px-6 py-4 font-semibold text-gray-800">
                                {{ $item['name'] }}
                                <br>
                                <span class="text-xs text-gray-400 font-normal">Fungsi: {{ $item['function'] }}</span>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center justify-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 p-1 border rounded text-center text-sm">
                                    <button type="submit" class="text-xs bg-gray-200 hover:bg-gray-300 text-gray-700 px-2 py-1 rounded">Update</button>
                                </form>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('katalog') }}" class="text-sm text-blue-600 hover:underline">← Tambah Produk Lain</a>

            <form action="{{ route('checkout.whatsapp') }}" method="POST">
                @csrf
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg flex items-center gap-2 transition">
                    <span>Checkout via WhatsApp</span>
                    <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                    </svg>
                </button>
            </form>
        </div>
    @else
        <div class="bg-white rounded-xl p-12 text-center border">
            <p class="text-gray-500 mb-4">Keranjang belanja Anda saat ini masih kosong.</p>
            <a href="{{ route('katalog') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-bold py-2.5 px-5 rounded-lg inline-block">Lihat Katalog Produk</a>
        </div>
    @endif
</div>
@endsection