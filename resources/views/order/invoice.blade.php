<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $order->order_number }} - Mitra Irigasi</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background-color: #ffffff !important;
                color: #000000 !important;
                padding: 0 !important;
            }
            .invoice-card {
                border: none !important;
                box-shadow: none !important;
                padding: 0 !important;
                margin: 0 !important;
                max-width: 100% !important;
            }
            @page {
                size: A4;
                margin: 1.2cm;
            }
        }
    </style>
</head>
<body class="bg-zinc-100 text-zinc-900 font-sans antialiased min-h-screen p-4 sm:p-8">

    <!-- ACTION BAR (HIDDEN WHEN PRINTING) -->
    <div class="max-w-4xl mx-auto mb-6 no-print flex flex-wrap items-center justify-between gap-4 bg-white p-4 rounded-md border border-zinc-300 shadow-xs">
        <div class="flex items-center gap-2 text-xs font-semibold uppercase tracking-wider text-zinc-700">
            <svg class="w-4 h-4 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <span>Faktur Pemesanan Resmi</span>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('orders.track', ['order_number' => $order->order_number]) }}" class="px-4 py-2 text-xs font-semibold text-zinc-700 bg-zinc-100 hover:bg-zinc-200 rounded transition border border-zinc-300">
                ← Kembali
            </a>
            <button onclick="window.print()" class="px-5 py-2 text-xs font-bold text-white bg-black hover:bg-zinc-800 rounded transition flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                <span>Cetak / Simpan PDF</span>
            </button>
        </div>
    </div>

    <!-- MAIN INVOICE CONTAINER -->
    <div class="max-w-4xl mx-auto bg-white border border-zinc-300 p-8 sm:p-12 invoice-card space-y-8">
        
        <!-- HEADER WITH LOGO & COMPANY METADATA -->
        <div class="flex flex-col sm:flex-row justify-between items-start gap-6 border-b-2 border-black pb-8">
            <div class="flex items-start gap-5">
                <img src="{{ asset('storage/logo_mitra_irigasi.png') }}" alt="Logo Mitra Irigasi" class="h-16 w-auto object-contain shrink-0">
                <div class="space-y-1">
                    <h1 class="text-2xl font-black tracking-tight text-black leading-none uppercase">MITRA IRIGASI</h1>
                    <p class="text-[11px] font-bold text-zinc-600 uppercase tracking-widest">Solusi Air Pertanian Modern</p>
                    <p class="text-xs text-zinc-600 pt-1 leading-relaxed">
                        Layanan Peralatan & Komponen Irigasi Lahan<br>
                        Contact / WhatsApp: <span class="font-semibold text-black">+62 821-4201-0020</span>
                    </p>
                </div>
            </div>

            <div class="text-left sm:text-right space-y-1 sm:self-start">
                <span class="inline-block px-3 py-1 bg-black text-white text-[11px] font-bold uppercase tracking-widest">
                    INVOICE
                </span>
                <h2 class="text-xl font-mono font-bold text-black pt-1">
                    #{{ $order->order_number }}
                </h2>
                <div class="text-xs text-zinc-600 space-y-0.5 pt-1">
                    <p>Tanggal: <strong class="text-black">{{ $order->created_at ? $order->created_at->format('d/m/Y') : '-' }}</strong></p>
                    <p>Status: 
                        @if($order->status === 'deal')
                            <span class="font-bold text-black underline uppercase">DEAL / DISETUJUI</span>
                        @elseif($order->status === 'cancelled')
                            <span class="font-bold text-zinc-500 line-through uppercase">DIBATALKAN</span>
                        @else
                            <span class="font-bold text-black uppercase">PENDING / PENAWARAN</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- CLIENT & DELIVERY METADATA GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 text-xs border-b border-zinc-200 pb-8">
            <div class="space-y-2">
                <p class="text-[10px] font-bold uppercase tracking-widest text-zinc-500 border-b border-zinc-200 pb-1">Klien / Pemohon</p>
                <div class="space-y-1 text-zinc-800">
                    <p class="font-black text-sm text-black uppercase leading-tight">{{ $order->visitor_name }}</p>
                    <p><span class="font-semibold text-zinc-600">No. Kontak:</span> {{ $order->visitor_phone }}</p>
                    <p><span class="font-semibold text-zinc-600">Email:</span> {{ $order->visitor_email }}</p>
                    <p><span class="font-semibold text-zinc-600">Tujuan Pengadaan:</span> {{ $order->visitor_purpose }}</p>
                </div>
            </div>

            <div class="space-y-2">
                <p class="text-[10px] font-bold uppercase tracking-widest text-zinc-500 border-b border-zinc-200 pb-1">Lokasi Lahan / Alamat Pengiriman</p>
                <p class="text-zinc-800 leading-relaxed whitespace-pre-line font-medium pt-0.5">
                    {{ $order->visitor_address }}
                </p>
            </div>
        </div>

        <!-- LINE ITEMS TABLE -->
        <div class="space-y-3">
            <p class="text-[10px] font-bold uppercase tracking-widest text-zinc-500">Rincian Barang / Equipment Details</p>

            <table class="w-full text-left text-xs border-collapse">
                <thead>
                    <tr class="border-b-2 border-black text-black font-bold uppercase tracking-wider">
                        <th class="py-3 px-2 w-10 text-center">No</th>
                        <th class="py-3 px-3 w-32">Kode</th>
                        <th class="py-3 px-3">Deskripsi Produk</th>
                        <th class="py-3 px-3 text-right w-24">Jumlah</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-zinc-200 border-b border-zinc-300">
                    @foreach($order->items as $index => $item)
                        <tr>
                            <td class="py-3 px-2 text-center font-mono text-zinc-500">{{ $index + 1 }}</td>
                            <td class="py-3 px-3 font-mono font-bold text-black">
                                {{ $item->product && $item->product->code ? $item->product->code : '-' }}
                            </td>
                            <td class="py-3 px-3 font-medium text-zinc-900">
                                {{ $item->product ? $item->product->name : 'Produk Tidak Diketahui' }}
                            </td>
                            <td class="py-3 px-3 text-right font-bold text-black">
                                {{ $item->quantity }} pcs
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- FINANCIAL SUMMARY & NOTES -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 pt-2">
            <div>
                @if($order->admin_notes)
                    <div class="border-l-2 border-black pl-4 py-1 text-xs space-y-1">
                        <p class="font-bold text-black uppercase tracking-wider text-[10px]">Catatan Admin:</p>
                        <p class="text-zinc-700 italic">"{{ $order->admin_notes }}"</p>
                    </div>
                @else
                    <div class="text-[11px] text-zinc-600 leading-relaxed border-l-2 border-zinc-300 pl-4 py-1 space-y-1">
                        <p class="font-bold text-black uppercase tracking-wider text-[10px]">Syarat & Ketentuan Penawaran:</p>
                        <p>1. Harga final disepakati melalui persetujuan Admin.</p>
                        <p>2. Pertanyaan teknis atau kelanjutan pesanan dapat melalui WhatsApp Admin.</p>
                    </div>
                @endif
            </div>

            <div class="space-y-2 text-xs text-zinc-800">
                <div class="flex justify-between items-center py-1 border-b border-zinc-200">
                    <span class="text-zinc-600">Total Item</span>
                    <span class="font-bold text-black">{{ count($order->items) }} Produk</span>
                </div>
                
                <div class="flex justify-between items-center py-1 border-b border-zinc-200">
                    <span class="text-zinc-600">Status Transaksi</span>
                    <span class="font-bold uppercase text-black">{{ $order->status }}</span>
                </div>

                @if($order->status === 'deal' && $order->total_price)
                    @if($order->subtotal)
                        <div class="flex justify-between items-center py-1 border-b border-zinc-200">
                            <span class="text-zinc-600">Subtotal</span>
                            <span>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
                        </div>
                    @endif

                    @if($order->discount_percent > 0)
                        <div class="flex justify-between items-center py-1 border-b border-zinc-200">
                            <span class="text-zinc-600">Diskon ({{ $order->discount_percent }}%)</span>
                            <span>- Rp {{ number_format($order->discount_amount, 0, ',', '.') }}</span>
                        </div>
                    @endif

                    <div class="flex justify-between items-center pt-3 border-t-2 border-black font-bold text-sm text-black">
                        <span class="uppercase">Total Akhir</span>
                        <span class="font-mono text-base">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </span>
                    </div>
                @else
                    <div class="flex justify-between items-center pt-3 border-t-2 border-black font-bold">
                        <span class="uppercase text-black">Total Deal</span>
                        <span class="text-zinc-600 italic">Dalam Negosiasi</span>
                    </div>
                @endif
            </div>
        </div>

        <!-- AUTHORIZATION / SIGNATURE BLOCK -->
        <div class="pt-12 border-t border-zinc-200 grid grid-cols-2 gap-8 text-center text-xs">
            <div class="space-y-16">
                <p class="text-zinc-500 font-semibold uppercase tracking-wider text-[10px]">Pemohon / Klien</p>
                <p class="font-bold text-black uppercase underline decoration-1 underline-offset-4">{{ $order->visitor_name }}</p>
            </div>
            <div class="space-y-16">
                <p class="text-zinc-500 font-semibold uppercase tracking-wider text-[10px]">Hormat Kami</p>
                <p class="font-bold text-black uppercase underline decoration-1 underline-offset-4">Mitra Irigasi</p>
            </div>
        </div>

        <!-- FOOTER -->
        <div class="text-center text-[10px] text-zinc-400 uppercase tracking-widest pt-4 border-t border-zinc-100">
            Dokumen ini diterbitkan secara otomatis oleh sistem Mitra Irigasi • Terbukti Sah
        </div>
    </div>

</body>
</html>