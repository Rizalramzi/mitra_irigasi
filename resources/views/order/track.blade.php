@extends('layouts.app')

@section('title', 'Lacak Pesanan - Mitra Irigasi')

@section('content')
<div class="py-12 bg-slate-50 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- HEADER LACAK DEKORATIF -->
        <div class="text-center mb-10">
            <span class="bg-emerald-50 text-emerald-700 text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider border border-emerald-100">
                Lacak Order
            </span>
            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 mt-3 tracking-tight">
                Lacak Status Pesanan
            </h1>
            <p class="text-slate-500 text-sm sm:text-base mt-2 max-w-lg mx-auto">
                Masukkan nomor pesanan (ORD-XXXX) Anda untuk memantau status pengadaan peralatan Anda secara langsung.
            </p>
        </div>

        <!-- FORM PENCARIAN -->
        <div class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-sm mb-8 transition-all hover:shadow-md">
            <form action="{{ route('orders.track') }}" method="GET" class="space-y-4">
                <div>
                    <label for="order_number" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                        Nomor Pesanan Anda
                    </label>
                    <div class="relative rounded-2xl shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            name="order_number" 
                            id="order_number" 
                            placeholder="Contoh: ORD-66D60C9D91D0E" 
                            value="{{ request('order_number') }}"
                            required 
                            class="w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-slate-800 text-sm sm:text-base focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                        >
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-3 pt-2">
                    <button 
                        type="submit" 
                        class="grow bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-sm px-6 py-3.5 rounded-2xl shadow-lg shadow-emerald-200 transition-all flex items-center justify-center gap-2"
                    >
                        <span>Cari Pesanan</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </button>
                    @if(request('order_number'))
                        <a 
                            href="{{ route('orders.track') }}" 
                            class="text-center bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm px-6 py-3.5 rounded-2xl border border-slate-200 transition-all"
                        >
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <!-- NOTIFIKASI ERROR PENCARIAN -->
        @if(session('error'))
            <div class="bg-rose-50 border-l-4 border-rose-500 text-rose-800 p-4 rounded-r-2xl shadow-sm mb-8 text-xs sm:text-sm flex items-start gap-3">
                <svg class="w-5 h-5 text-rose-600 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <div>
                    <span class="font-bold">Pencarian Gagal</span>
                    <p class="mt-0.5 text-rose-700">{{ session('error') }}</p>
                </div>
            </div>
        @endif

        <!-- DETAILS TAMPILAN PESANAN -->
        @if(isset($order) && $order)
            <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden mb-8">
                <!-- HEADER CARD DETAIL -->
                <div class="p-6 sm:p-8 border-b border-slate-100 bg-linear-to-r from-emerald-500/10 to-transparent flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <div class="flex items-center gap-2.5">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest leading-none">Nomor Pesanan</span>
                            <span class="bg-slate-100 text-slate-800 text-[10px] font-extrabold px-2 py-0.5 rounded border border-slate-200">
                                DB ID: #{{ $order->id }}
                            </span>
                        </div>
                        <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 mt-1.5">
                            {{ $order->order_number }}
                        </h2>
                        <p class="text-slate-400 text-xs mt-1">
                            Diajukan pada {{ $order->created_at ? $order->created_at->format('d M Y, H:i') : '-' }} WIB
                        </p>
                    </div>

                    <div class="shrink-0">
                        @if($order->status === 'pending')
                            <span class="inline-flex items-center gap-1.5 bg-amber-50 text-amber-700 border border-amber-200 text-xs font-extrabold px-3 py-1.5 rounded-xl uppercase tracking-wider">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-500 animate-ping"></span>
                                Pending / Menunggu
                            </span>
                        @elseif($order->status === 'deal')
                            <span class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-extrabold px-3 py-1.5 rounded-xl uppercase tracking-wider">
                                <svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
                                </svg>
                                Kesepakatan (Deal)
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 bg-rose-50 text-rose-700 border border-rose-200 text-xs font-extrabold px-3 py-1.5 rounded-xl uppercase tracking-wider">
                                Dibatalkan
                            </span>
                        @endif
                    </div>
                </div>

                <!-- PROGRESS BAR DILENGKAPI SVG STEP -->
                <div class="px-6 py-10 sm:px-12 border-b border-slate-100 bg-slate-50/50">
                    <div class="relative">
                        <!-- GARIS PROGRES -->
                        <div class="absolute inset-0 flex items-center" aria-hidden="true">
                            <div class="w-full bg-slate-200 h-1 rounded-full relative overflow-hidden">
                                @if($order->status === 'deal')
                                    <div class="w-full bg-emerald-500 h-full"></div>
                                @elseif($order->status === 'cancelled')
                                    <div class="w-1/2 bg-rose-500 h-full"></div>
                                @else
                                    <div class="w-1/2 bg-emerald-500 h-full animate-pulse"></div>
                                @endif
                            </div>
                        </div>

                        <!-- KELOMPOK TITIK STEP -->
                        <div class="relative flex justify-between">
                            <!-- Step 1: Diajukan -->
                            <div class="flex flex-col items-center">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center text-white text-xs font-bold border-4 shadow-sm transition-all duration-300 {{ $order->status === 'cancelled' ? 'bg-rose-500 border-rose-100' : 'bg-emerald-600 border-emerald-100' }}">
                                    1
                                </div>
                                <span class="mt-2.5 text-xs font-extrabold text-slate-800">Diajukan</span>
                                <span class="text-[10px] text-slate-400 mt-0.5">Draf Terkirim</span>
                            </div>

                            <!-- Step 2: Proses Review & WA -->
                            <div class="flex flex-col items-center">
                                @if($order->status === 'deal')
                                    <div class="w-10 h-10 rounded-full bg-emerald-600 border-4 border-emerald-100 flex items-center justify-center text-white text-xs font-bold shadow-sm">
                                        2
                                    </div>
                                @elseif($order->status === 'cancelled')
                                    <div class="w-10 h-10 rounded-full bg-rose-500 border-4 border-rose-100 flex items-center justify-center text-white text-xs font-bold shadow-sm">
                                        ✕
                                    </div>
                                @else
                                    <div class="w-10 h-10 rounded-full bg-amber-400 border-4 border-amber-100 flex items-center justify-center text-white text-xs font-bold shadow-sm animate-bounce">
                                        2
                                    </div>
                                @endif
                                <span class="mt-2.5 text-xs font-extrabold text-slate-800">Review & Admin WA</span>
                                <span class="text-[10px] text-slate-400 mt-0.5">Negosiasi Harga</span>
                            </div>

                            <!-- Step 3: Deal / Selesai -->
                            <div class="flex flex-col items-center">
                                @if($order->status === 'deal')
                                    <div class="w-10 h-10 rounded-full bg-emerald-600 border-4 border-emerald-100 flex items-center justify-center text-white text-xs font-bold shadow-sm">
                                         ✓
                                    </div>
                                @elseif($order->status === 'cancelled')
                                    <div class="w-10 h-10 rounded-full bg-slate-200 border-4 border-slate-100 flex items-center justify-center text-slate-400 text-xs font-bold shadow-sm">
                                         ✕
                                    </div>
                                @else
                                    <div class="w-10 h-10 rounded-full bg-slate-200 border-4 border-slate-100 flex items-center justify-center text-slate-400 text-xs font-bold shadow-sm">
                                         3
                                    </div>
                                @endif
                                
                                @if($order->status === 'cancelled')
                                    <span class="mt-2.5 text-xs font-extrabold text-rose-600">Dibatalkan</span>
                                @else
                                    <span class="mt-2.5 text-xs font-extrabold text-slate-800">Deal Spesifikasi</span>
                                @endif
                                <span class="text-[10px] text-slate-400 mt-0.5">Harga Sepakat</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RINCIAN AREA -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-0 border-b border-slate-100">
                    <!-- INFORMASI PEMESAN -->
                    <div class="p-6 sm:p-8 space-y-4 border-r border-slate-100">
                        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-l-4 border-emerald-500 pl-2">
                            Detail Klien & Pengadaan
                        </h3>
                        
                        <div class="space-y-3 text-xs sm:text-sm">
                            <div>
                                <span class="block text-slate-400 font-medium text-[10px] uppercase">Nama Pemohon</span>
                                <strong class="text-slate-800 text-sm mt-0.5 block">{{ $order->visitor_name }}</strong>
                            </div>
                            <div>
                                <span class="block text-slate-400 font-medium text-[10px] uppercase">No. WhatsApp / HP</span>
                                <strong class="text-slate-800 text-sm mt-0.5 block">{{ $order->visitor_phone }}</strong>
                            </div>
                            <div>
                                <span class="block text-slate-400 font-medium text-[10px] uppercase">Alamat Email</span>
                                <strong class="text-slate-800 text-sm mt-0.5 block">{{ $order->visitor_email }}</strong>
                            </div>
                            <div>
                                <span class="block text-slate-400 font-medium text-[10px] uppercase">Tujuan Pengadaan</span>
                                <strong class="text-slate-800 text-sm mt-0.5 block">{{ $order->visitor_purpose }}</strong>
                            </div>
                            <div>
                                <span class="block text-slate-400 font-medium text-[10px] uppercase">Alamat Lahan / Pengiriman</span>
                                <p class="text-slate-800 font-semibold leading-relaxed mt-0.5">
                                    {{ $order->visitor_address }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- RINCIAN BARANG -->
                    <div class="p-6 sm:p-8 space-y-4">
                        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider border-l-4 border-emerald-500 pl-2">
                            Daftar Item Pengajuan
                        </h3>
                        
                        <div class="divide-y divide-slate-100 max-h-70 overflow-y-auto pr-1">
                            @foreach($order->items as $item)
                                <div class="py-3 flex items-center justify-between gap-4 text-xs sm:text-sm">
                                    <div>
                                        <strong class="text-slate-800 font-bold block">
                                            {{ $item->product ? $item->product->name : 'Produk Tidak Diketahui' }}
                                        </strong>
                                        @if($item->product && $item->product->code)
                                            <span class="text-[10px] text-slate-400 font-semibold font-mono uppercase bg-slate-100 border border-slate-200 px-1 py-0.5 rounded mt-0.5 inline-block">
                                                Code: {{ $item->product->code }}
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-slate-500 font-bold text-right shrink-0">
                                        {{ $item->quantity }} pcs
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- TOTAL DEAL DI ADMIN -->
                        @if($order->status === 'deal')
                            <div class="pt-4 border-t border-slate-200 flex justify-between items-center">
                                <span class="text-xs font-bold text-slate-500 uppercase">Harga Kesepakatan (Nett)</span>
                                <strong class="text-lg sm:text-xl font-extrabold text-emerald-600">
                                    Rp {{ number_format($order->total_price, 2, ',', '.') }}
                                </strong>
                            </div>
                        @else
                            <div class="pt-4 border-t border-slate-200">
                                <div class="bg-amber-50/50 p-3.5 rounded-2xl border border-amber-100 flex items-center gap-2">
                                    <svg class="w-4 h-4 text-amber-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    <span class="text-[11px] font-bold text-amber-800 leading-normal">
                                        Harga penawaran dan status stok akan diinformasikan oleh Admin Chat WA.
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- CATATAN ADMIN & ACTION BUTTON -->
                <div class="p-6 sm:p-8 bg-slate-50/50 space-y-4">
                    @if($order->admin_notes)
                        <div class="p-4 bg-white border border-slate-200 rounded-2xl shadow-sm">
                            <span class="block text-slate-400 font-medium text-[10px] uppercase mb-1">Catatan Admin</span>
                            <span class="text-xs sm:text-sm text-slate-700 leading-relaxed italic">
                                "{{ $order->admin_notes }}"
                            </span>
                        </div>
                    @endif

                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-2">
                        <span class="text-xs text-slate-400">
                            Butuh bantuan dengan pesanan Anda? Hubungi admin.
                        </span>
                        
                        @php
                            $adminPhone = '6282142010020';
                            $waMessage = "Halo Admin Mitra Irigasi, saya ingin bertanya tentang status pesanan: " . $order->order_number . " atas nama " . $order->visitor_name;
                            $waUrl = "https://wa.me/" . $adminPhone . "?text=" . urlencode($waMessage);
                        @endphp
                        <a 
                            href="{{ $waUrl }}" 
                            target="_blank" 
                            class="bg-[#25D366] hover:bg-[#128C7E] text-white text-xs font-bold px-5 py-3 rounded-xl transition-all shadow-md flex items-center gap-2"
                        >
                            <svg class="w-4 h-4 fill-white" viewBox="0 0 24 24">
                                <path d="M12.012 2c-5.506 0-9.989 4.478-9.99 9.984a9.96 9.96 0 001.333 4.993L2 22l5.233-1.371a9.948 9.948 0 004.77 1.21h.005c5.505 0 9.989-4.478 9.99-9.983A9.97 9.97 0 0012.012 2zm5.727 14.129c-.315.89-.924 1.6-1.745 2.03-.497.26-1.077.411-1.672.411-2.28 0-4.52-1.282-6.027-3.473a9.7 9.7 0 01-1.89-4.004A3.9 3.9 0 017.5 9.1c.148-.255.433-.42.748-.42.25 0 .428.05.589.26l1.01 1.34c.145.2.148.455.01.625l-.47.575c-.15.185-.145.41.01.615.71.93 1.55 1.63 2.505 2.115.165.085.348.095.51.01l.73-.61c.15-.125.365-.15.535-.075l1.455.725c.34.17.435.485.45.694.02.261-.06.67-.32 1.205z"/>
                            </svg>
                            <span>Hubungi Admin WA</span>
                        </a>
                    </div>
                </div>
            </div>
        @elseif(request('order_number'))
            <!-- EMPTY STATE / ORDER NOT FOUND -->
            <div class="bg-white rounded-3xl border border-slate-200 p-8 sm:p-12 text-center shadow-sm">
                <div class="w-16 h-16 bg-slate-100 rounded-2xl flex items-center justify-center mx-auto text-slate-400 mb-4 border border-slate-200">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-slate-800">Pesanan Tidak Ditemukan</h3>
                <p class="text-slate-400 text-xs sm:text-sm mt-2 max-w-sm mx-auto">
                    Masukkan nomor pesanan yang valid untuk melihat detail pengajuan. Silakan periksa kembali tautan atau email pemesanan Anda.
                </p>
                <div class="mt-6">
                    <a href="{{ route('orders.track') }}" class="inline-block bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs px-5 py-3 rounded-xl border border-slate-200 transition">
                        Kembali
                    </a>
                </div>
            </div>
        @else
            <!-- LANDING LACAK SEBELUM CARI -->
            <div class="bg-white rounded-3xl border border-slate-200 p-8 sm:p-12 text-center shadow-sm">
                <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-emerald-100 shadow-lg shadow-emerald-50">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/>
                    </svg>
                </div>
                <h3 class="text-lg font-extrabold text-slate-800">Masukkan Kode Pemesanan</h3>
                <p class="text-slate-400 text-xs sm:text-sm mt-2 max-w-sm mx-auto">
                    Status pemesanan akan ditampilkan di sini. Harap persiapkan nomor pesanan Anda (misal: ORD-66D60C9D91D0E).
                </p>
            </div>
        @endif

    </div>
</div>
@endsection
