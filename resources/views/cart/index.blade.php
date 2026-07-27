@extends('layouts.app')

@section('title', 'Keranjang Belanja - Mitra Irigasi')

@section('content')
<div x-data="cartPageData()" class="py-8 bg-slate-50 min-h-screen">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- HEADER SECTION -->
        <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200 shadow-sm mb-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block mb-1">
                    Proses Pemesanan Peralatan
                </span>
                <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                    Keranjang Belanja Anda
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-1">
                    Periksa kembali daftar komponen irigasi yang ingin Anda ajukan penawarannya.
                </p>
            </div>
            <a href="{{ route('katalog') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-emerald-600 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 px-4 py-2.5 rounded-xl transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                <span>Tambah Produk Lain</span>
            </a>
        </div>

        <!-- NOTIFIKASI TOAST MELAYANG -->
        <div 
            x-show="toast.show" 
            x-transition 
            class="fixed bottom-5 right-5 bg-emerald-800 text-white px-5 py-3 rounded-2xl shadow-2xl flex items-center gap-3 z-50 text-xs sm:text-sm font-bold border border-emerald-600"
            style="display: none;"
        >
            <span class="text-base">✓</span>
            <span x-text="toast.message"></span>
        </div>

        @if(count($cart) > 0)
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
                
                <!-- DAFTAR ITEM KERANJANG -->
                <div class="lg:col-span-8 bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-4 sm:p-6 border-b border-slate-100 bg-slate-50 flex justify-between items-center">
                        <span class="text-xs font-bold uppercase tracking-wider text-slate-500">
                            Daftar Komponen ({{ count($cart) }} Jenis)
                        </span>
                    </div>

                    <div class="divide-y divide-slate-100">
                        @foreach($cart as $id => $item)
                            <div id="cart-row-{{ $id }}" class="p-4 sm:p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <div class="space-y-1 flex-1">
                                    <span class="bg-emerald-50 text-emerald-700 text-[10px] font-bold px-2 py-0.5 rounded border border-emerald-200 uppercase tracking-wider">
                                        Komponen Irigasi
                                    </span>
                                    <h3 class="font-bold text-slate-900 text-base">
                                        {{ $item['name'] }}
                                    </h3>
                                    <p class="text-xs text-slate-500">
                                        <strong class="text-slate-600">Fungsi:</strong> {{ $item['function'] }}
                                    </p>
                                </div>

                                <div class="flex items-center justify-between sm:justify-end gap-4 w-full sm:w-auto pt-3 sm:pt-0 border-t sm:border-0 border-slate-100">
                                    
                                    <!-- KONTROL QUANTITY MODEL KATALOG (- Qty +) -->
                                    <div class="flex items-center bg-white border border-emerald-500 rounded-xl overflow-hidden shadow-sm">
                                        <button 
                                            @click="updateQty({{ $id }}, 'decrement')" 
                                            class="px-3.5 py-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-black text-xs transition active:scale-95"
                                        >
                                            -
                                        </button>
                                        <span class="px-3.5 py-2 text-xs font-extrabold text-slate-800 min-w-9 text-center" id="qty-text-{{ $id }}">
                                            {{ $item['quantity'] }}
                                        </span>
                                        <button 
                                            @click="updateQty({{ $id }}, 'increment')" 
                                            class="px-3.5 py-2 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-black text-xs transition active:scale-95"
                                        >
                                            +
                                        </button>
                                    </div>

                                    <!-- Form Hapus Item -->
                                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Hapus dari keranjang" class="p-2 text-rose-500 hover:text-rose-700 hover:bg-rose-50 rounded-xl transition">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- RINGKASAN & ACTION CHECKOUT -->
                <div class="lg:col-span-4 space-y-6">
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-5">
                        <h3 class="font-bold text-slate-900 text-base border-b border-slate-100 pb-3">
                            Ringkasan Pengajuan
                        </h3>

                        <div class="space-y-3 text-xs sm:text-sm">
                            <div class="flex justify-between text-slate-600">
                                <span>Pemohon</span>
                                <strong class="text-slate-800">{{ Auth::user()->name }}</strong>
                            </div>
                            <div class="flex justify-between text-slate-600">
                                <span>No. WhatsApp</span>
                                <strong class="text-slate-800">{{ Auth::user()->phone_number }}</strong>
                            </div>
                            <div class="flex justify-between text-slate-600">
                                <span>Tujuan</span>
                                <strong class="text-slate-800">{{ Auth::user()->visitor_purpose }}</strong>
                            </div>
                            <div class="pt-2 border-t border-slate-100 flex justify-between text-slate-600">
                                <span>Status Harga</span>
                                <span class="text-emerald-700 font-bold bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200 text-xs">
                                    Nego via WA
                                </span>
                            </div>
                        </div>

                        <form action="{{ route('checkout.whatsapp') }}" method="POST" class="pt-2">
                            @csrf
                            <button 
                                type="submit" 
                                class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm py-3.5 px-4 rounded-xl shadow-lg shadow-emerald-200 transition flex items-center justify-center gap-2"
                            >
                                <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                                </svg>
                                <span>Ajukan via WhatsApp</span>
                            </button>
                        </form>

                        <p class="text-[11px] text-slate-400 text-center leading-relaxed">
                            Draf pesanan akan dikirim langsung ke Admin CV. Wijaya Karya (0821-4201-0020) untuk konfirmasi ketersediaan dan penawaran harga.
                        </p>
                    </div>
                </div>

            </div>
        @else
            <!-- STATE KERANJANG KOSONG -->
            <div class="bg-white rounded-3xl p-12 text-center border border-slate-200 shadow-sm max-w-xl mx-auto space-y-4">
                <div class="w-16 h-16 bg-slate-100 text-slate-400 rounded-2xl flex items-center justify-center mx-auto">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Keranjang Belanja Masih Kosong</h3>
                    <p class="text-xs sm:text-sm text-slate-500 mt-1">Anda belum memilih komponen peralatan irigasi apapun.</p>
                </div>
                <a href="{{ route('katalog') }}" class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs sm:text-sm py-3 px-6 rounded-xl shadow-md shadow-emerald-200 transition">
                    Lihat Katalog Produk Sekarang
                </a>
            </div>
        @endif

    </div>
</div>

<script>
    function cartPageData() {
        return {
            toast: { show: false, message: '' },

            showToast(msg) {
                this.toast.message = msg;
                this.toast.show = true;
                setTimeout(() => { this.toast.show = false; }, 2000);
            },

            async updateQty(productId, action) {
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                try {
                    const res = await fetch(`/cart/update/${productId}`, {
                        method: 'PATCH',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({ action: action })
                    });
                    
                    const data = await res.json();
                    
                    if (data.status === 'success') {
                        if (data.quantity > 0) {
                            // Update angka jumlah tanpa reload
                            const qtyElem = document.getElementById(`qty-text-${productId}`);
                            if (qtyElem) qtyElem.innerText = data.quantity;
                            this.showToast('Jumlah produk diperbarui!');
                        } else {
                            // Jika quantity menjadi 0, reload halaman agar daftar terupdate
                            window.location.reload();
                        }
                    }
                } catch (e) {
                    console.error('Error updating quantity:', e);
                }
            }
        };
    }
</script>
@endsection