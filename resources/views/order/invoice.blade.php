<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $order->order_number }} - Mitra Irigasi</title>
    <!-- Tailwind CSS CDN for styling -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        :root {
            --main-color: #4169E1;
            --main-color-hover: #003399;
            --main-color-light: #e5edff;
            --main-color-dark: #002266;
        }

        @media print {
            .no-print {
                display: none !important;
            }
            body {
                background-color: #ffffff !important;
                color: #0f172a !important;
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
                margin: 1.5cm;
            }
        }
    </style>
</head>
<body class="bg-slate-100 min-h-screen text-slate-800 font-sans p-4 sm:p-8">

    <!-- BAR AKSI TOP (AKAN TERSEMBUNYI SAAT DICETAK) -->
    <div class="max-w-4xl mx-auto mb-6 no-print flex flex-wrap items-center justify-between gap-4 bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
        <div class="flex items-center gap-2 text-slate-600 text-sm font-semibold">
            <svg class="w-5 h-5 text-[#4169E1]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            <span>Invoice / Faktur Pemesanan</span>
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('orders.track', ['order_number' => $order->order_number]) }}" class="px-4 py-2 text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-xl transition border border-slate-200">
                ← Kembali ke Lacak
            </a>
            <button onclick="window.print()" class="px-5 py-2 text-xs font-bold text-white bg-[#4169E1] hover:bg-[#003399] rounded-xl transition shadow-md shadow-blue-200 flex items-center gap-2 cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                </svg>
                <span>Cetak / Simpan PDF</span>
            </button>
        </div>
    </div>

    <!-- WADAH UTAMA INVOICE -->
    <div class="max-w-4xl mx-auto bg-white rounded-3xl border border-slate-200 p-8 sm:p-12 shadow-sm invoice-card space-y-8">
        
        <!-- HEADER KOP SURAT PERUSAHAAN DENGAN LOGO MITRA IRIGASI -->
        <div class="flex flex-col sm:flex-row justify-between items-start gap-6 border-b-2 border-[#4169E1] pb-8">
            <div class="flex items-start gap-4">
                <img src="{{ asset('storage/logo_mitra_irigasi.png') }}" alt="Logo Mitra Irigasi" class="h-16 w-auto object-contain shrink-0">
                <div>
                    <h1 class="text-2xl font-black text-slate-900 tracking-tight leading-none">MITRA IRIGASI</h1>
                    <p class="text-xs text-[#4169E1] font-extrabold uppercase tracking-wider mt-1">Solusi Air Pertanian Modern</p>
                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        WhatsApp Admin: <strong class="text-slate-700">+62 821-4201-0020</strong><br>
                        Layanan Peralatan & Komponen Irigasi Lahan
                    </p>
                </div>
            </div>

            <div class="text-left sm:text-right">
                <span class="inline-block px-3 py-1 bg-[#4169E1] text-white text-xs font-black uppercase tracking-widest rounded-md shadow-xs">
                    FAKTUR PESANAN
                </span>
                <h2 class="text-2xl font-black text-[#002266] mt-2">
                    {{ $order->order_number }}
                </h2>
                <div class="text-xs text-slate-500 mt-1 space-y-0.5">
                    <p>Tanggal: <strong class="text-slate-800">{{ $order->created_at ? $order->created_at->format('d F Y') : '-' }}</strong></p>
                    <p>Status: 
                        @if($order->status === 'deal')
                            <span class="text-[#003399] font-extrabold bg-[#e5edff] px-2 py-0.5 rounded border border-[#c7d7fe]">DEAL / DISETUJUI</span>
                        @elseif($order->status === 'cancelled')
                            <span class="text-rose-700 font-extrabold bg-rose-50 px-2 py-0.5 rounded border border-rose-200">DIBATALKAN</span>
                        @else
                            <span class="text-amber-700 font-extrabold bg-amber-50 px-2 py-0.5 rounded border border-amber-200">PENDING / PENAWARAN</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        <!-- DETAIL KLIEN & PENGADAAN -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 bg-[#e5edff]/60 p-6 rounded-2xl border border-[#c7d7fe] text-xs sm:text-sm">
            <div class="space-y-2">
                <span class="text-[10px] font-bold text-[#003399] uppercase tracking-wider block">INFORMASI PEMOHON / KLIEN</span>
                <p class="font-extrabold text-slate-900 text-base leading-tight">{{ $order->visitor_name }}</p>
                <p class="text-slate-600"><span class="font-semibold text-slate-500">No. WA/HP:</span> {{ $order->visitor_phone }}</p>
                <p class="text-slate-600"><span class="font-semibold text-slate-500">Email:</span> {{ $order->visitor_email }}</p>
                <p class="text-slate-600"><span class="font-semibold text-slate-500">Tujuan Pengadaan:</span> {{ $order->visitor_purpose }}</p>
            </div>

            <div class="space-y-2">
                <span class="text-[10px] font-bold text-[#003399] uppercase tracking-wider block">ALAMAT LOKASI LAHAN / PENGIRIMAN</span>
                <p class="text-slate-800 font-medium leading-relaxed bg-white p-3 rounded-xl border border-[#c7d7fe] shadow-xs">
                    {{ $order->visitor_address }}
                </p>
            </div>
        </div>

        <!-- TABEL RINCIAN ITEM -->
        <div class="space-y-3">
            <h3 class="text-xs font-extrabold text-slate-900 uppercase tracking-wider flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-[#4169E1]"></span>
                <span>Rincian Barang / Peralatan Dipesan</span>
            </h3>

            <div class="border border-slate-200 rounded-2xl overflow-hidden shadow-xs">
                <table class="w-full text-left text-xs sm:text-sm border-collapse">
                    <thead>
                        <tr class="bg-[#002266] text-white font-bold uppercase tracking-wider border-b border-[#001540]">
                            <th class="py-3.5 px-4 w-12 text-center">No</th>
                            <th class="py-3.5 px-4">Kode Produk</th>
                            <th class="py-3.5 px-4">Nama Produk / Peralatan</th>
                            <th class="py-3.5 px-4 text-center w-28">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($order->items as $index => $item)
                            <tr class="hover:bg-slate-50/50">
                                <td class="py-3.5 px-4 text-center font-semibold text-slate-500">{{ $index + 1 }}</td>
                                <td class="py-3.5 px-4 font-mono font-bold text-[#4169E1]">
                                    {{ $item->product && $item->product->code ? $item->product->code : '-' }}
                                </td>
                                <td class="py-3.5 px-4 font-bold text-slate-900">
                                    {{ $item->product ? $item->product->name : 'Produk Tidak Diketahui' }}
                                </td>
                                <td class="py-3.5 px-4 text-center font-extrabold text-slate-800">
                                    {{ $item->quantity }} pcs
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- RINGKASAN HARGA & CATATAN ADMIN -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4 border-t border-slate-200">
            <div>
                @if($order->admin_notes)
                    <div class="bg-amber-50/70 border border-amber-200 p-4 rounded-2xl text-xs space-y-1">
                        <span class="font-extrabold text-amber-900 uppercase tracking-wider block">Catatan Tambahan Admin:</span>
                        <p class="text-amber-800 leading-relaxed italic">"{{ $order->admin_notes }}"</p>
                    </div>
                @else
                    <div class="text-xs text-slate-400 space-y-1">
                        <p class="font-semibold text-slate-500">Syarat & Ketentuan Penawaran:</p>
                        <p>1. Penawaran harga bersifat final setelah status Deal disetujui Admin.</p>
                        <p>2. Konfirmasi kelanjutan dapat menghubungi WhatsApp Admin Mitra Irigasi.</p>
                    </div>
                @endif
            </div>

            <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200 space-y-3">
                <div class="flex justify-between items-center text-xs text-slate-500">
                    <span>Jumlah Item:</span>
                    <span class="font-bold text-slate-800">{{ count($order->items) }} Produk</span>
                </div>
                
                <div class="flex justify-between items-center text-xs text-slate-500">
                    <span>Status Penawaran:</span>
                    <span class="font-bold uppercase 
                        @if($order->status === 'deal') text-[#4169E1] 
                        @elseif($order->status === 'cancelled') text-rose-700 
                        @else text-amber-700 @endif"
                    >
                        {{ $order->status }}
                    </span>
                </div>

                <div class="pt-3 border-t border-slate-200 flex justify-between items-center">
                    <span class="text-xs font-extrabold text-slate-700 uppercase">Total Harga Deal:</span>
                    @if($order->status === 'deal' && $order->total_price)
                        <strong class="text-xl font-black text-[#4169E1]">
                            Rp {{ number_format($order->total_price, 0, ',', '.') }}
                        </strong>
                    @else
                        <span class="text-xs font-bold text-amber-800 bg-amber-100 px-2.5 py-1 rounded-md border border-amber-200">
                            Dalam Negosiasi WA
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- TANDA TANGAN & PENGESAHAN -->
        <div class="pt-8 border-t border-slate-200 grid grid-cols-2 gap-8 text-center text-xs">
            <div>
                <p class="text-slate-400 font-semibold mb-12">Pemohon / Klien,</p>
                <p class="font-extrabold text-slate-800 underline">{{ $order->visitor_name }}</p>
            </div>
            <div>
                <p class="text-slate-400 font-semibold mb-12">Hormat Kami,</p>
                <p class="font-extrabold text-slate-800 underline">Admin Mitra Irigasi</p>
            </div>
        </div>

        <!-- FOOTER HALAMAN -->
        <div class="text-center text-[10px] text-slate-400 pt-4 border-t border-slate-100">
            Faktur ini dihasilkan secara otomatis oleh sistem Mitra Irigasi • Dokumen ini sah dan dapat digunakan sebagai acuan pengadaan.
        </div>
    </div>

</body>
</html>
