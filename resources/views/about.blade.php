@extends('layouts.app')

@section('title', 'Tentang Kami - Mitra Irigasi | CV. Wijaya Karya')

@section('content')
<div class="py-10 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- 1. HERO SECTION -->
        <div class="bg-gradient-to-br from-emerald-900 via-emerald-800 to-slate-900 text-white rounded-3xl p-8 sm:p-14 shadow-xl relative overflow-hidden">
            <div class="max-w-3xl relative z-10 space-y-4">
                <span class="inline-block bg-emerald-700/60 text-emerald-200 border border-emerald-500/40 text-xs font-bold px-3.5 py-1.5 rounded-full tracking-wider uppercase">
                    Lini Usaha Resmi CV. Wijaya Karya (Est. 1998)
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight">
                    Mendorong Modernisasi <br>
                    <span class="text-emerald-400">Pengairan Pertanian Indonesia</span>
                </h1>
                <p class="text-emerald-100/90 text-sm sm:text-base leading-relaxed">
                    <strong class="text-white">Mitra Irigasi</strong> (www.mitra-irigasi.com) adalah lini produk dan layanan spesialis irigasi presisi dari <strong class="text-white">CV. Wijaya Karya</strong>. Berbekal pengalaman teknik dan manufaktur sejak 1998, kami berkomitmen membantu petani, pengelola kebun, dan instansi mewujudkan pengairan lahan yang efisien, presisi, dan mudah dioperasikan.
                </p>
            </div>
        </div>

        <!-- 2. CERITA SINGKAT & LATAR BELAKANG -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 space-y-4">
                    <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block">
                        Latar Belakang & Pengalaman Teknik
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-snug">
                        Pengalaman Rekayasa Teknik Sejak 1998 untuk Solusi Lahan Pertanian
                    </h2>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        CV. Wijaya Karya didirikan pada tahun 1998 oleh para insinyur dan praktisi bisnis. Mengawali kiprah di bidang perdagangan teknik, konstruksi, dan pabrikasi, kami menghadirkan lini spesialis **Mitra Irigasi** guna menjawab tantangan kelangkaan air dan efisiensi biaya tenaga kerja penyiraman lahan.
                    </p>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Dengan integrasi komponen *drip tape*, *micro sprinkler*, solenoid valve, hingga sistem filtrasi presisi, kami memastikan setiap tetes air yang keluar memberi nutrisi optimal langsung pada perakaran tanaman Anda.
                    </p>
                </div>

                <!-- STATISTIK PENCAPAIAN & LEGALITAS -->
                <div class="lg:col-span-5 bg-slate-50 p-6 sm:p-8 rounded-2xl border border-slate-200 grid grid-cols-2 gap-6 text-center">
                    <div class="p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="block text-2xl sm:text-3xl font-black text-emerald-600">1998</span>
                        <span class="text-[11px] font-semibold text-slate-500 uppercase mt-1 block">Tahun Berdiri</span>
                    </div>
                    <div class="p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="block text-2xl sm:text-3xl font-black text-slate-900">100%</span>
                        <span class="text-[11px] font-semibold text-slate-500 uppercase mt-1 block">Produk Original</span>
                    </div>
                    <div class="p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="block text-2xl sm:text-3xl font-black text-slate-900">NIB</span>
                        <span class="text-[11px] font-semibold text-slate-500 uppercase mt-1 block">9120219220141</span>
                    </div>
                    <div class="p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="block text-2xl sm:text-3xl font-black text-emerald-600">Resmi</span>
                        <span class="text-[11px] font-semibold text-slate-500 uppercase mt-1 block">SPH & Faktur Pajak</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. KEUNGGULAN LAYANAN KAMI (4 PILAR) -->
        <div>
            <div class="text-center max-w-2xl mx-auto mb-8">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Mengapa Memilih Mitra Irigasi?</h2>
                <p class="text-slate-500 text-xs sm:text-sm mt-2">Komitmen pelayanan terbaik berbasis rekayasa teknik untuk keberhasilan panen Anda.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                    <div class="w-10 h-10 bg-emerald-100 text-emerald-700 rounded-xl flex items-center justify-center font-bold text-lg">💧</div>
                    <h3 class="font-bold text-slate-900 text-base">Pengairan Presisi</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Menyediakan emitter & drip tape dengan takaran debit air ($L/jam$) terukur untuk menjaga kelembaban tanah optimal.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                    <div class="w-10 h-10 bg-blue-100 text-blue-700 rounded-xl flex items-center justify-center font-bold text-lg">🛡️</div>
                    <h3 class="font-bold text-slate-900 text-base">Material Tahan UV</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Selang PE dan komponen berbahan *engineering plastic* tahan paparan sinar matahari outdoor dan pupuk cair.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                    <div class="w-10 h-10 bg-amber-100 text-amber-700 rounded-xl flex items-center justify-center font-bold text-lg">💬</div>
                    <h3 class="font-bold text-slate-900 text-base">Pendampingan Teknis</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Tim ahli siap memberikan konsultasi tata letak selang, ukuran pompa ($Bar$), dan jumlah nozzle sesuai kebutuhan lahan.</p>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                    <div class="w-10 h-10 bg-purple-100 text-purple-700 rounded-xl flex items-center justify-center font-bold text-lg">📑</div>
                    <h3 class="font-bold text-slate-900 text-base">Penawaran Transparan</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Proses checkout dari keranjang langsung menghasilkan rincian rapi untuk dikirim dan dinegosiasikan via WhatsApp.</p>
                </div>
            </div>
        </div>

        <!-- 4. VISI & MISI PERUSAHAAN -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-slate-900 text-white p-8 sm:p-10 rounded-3xl shadow-lg space-y-4">
                <div class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center font-bold text-2xl">🎯</div>
                <h2 class="text-2xl font-bold">Visi Perusahaan</h2>
                <p class="text-slate-300 text-xs sm:text-sm leading-relaxed">
                    Menjadi perusahaan yang berkelanjutan dan pemimpin di dalam industri teknik, konstruksi, serta penyedia teknologi irigasi presisi secara global.
                </p>
            </div>

            <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-sm space-y-4">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center font-bold text-2xl">🚀</div>
                <h2 class="text-2xl font-bold text-slate-900">Misi Perusahaan</h2>
                <ul class="text-slate-600 text-xs sm:text-sm space-y-3">
                    <li class="flex items-start gap-2.5">
                        <span class="w-5 h-5 bg-emerald-100 text-emerald-700 rounded-full font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">✓</span>
                        <span>Memberikan nilai tambah terbaik dengan menggabungkan pengetahuan kebutuhan pelanggan serta pengalaman teknik.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="w-5 h-5 bg-emerald-100 text-emerald-700 rounded-full font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">✓</span>
                        <span>Menghadirkan komponen irigasi berkualitas tinggi dengan harga kompetitif bagi petani skala kecil maupun industri.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <span class="w-5 h-5 bg-emerald-100 text-emerald-700 rounded-full font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">✓</span>
                        <span>Memastikan penciptaan nilai dalam kualitas produk dan integritas pelayanan yang ramah dan solutif.</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- 5. INFORMASI KONTAK & AKSI DIRECT WA (TERINTEGRASI DATA MITRA IRIGASI) -->
        <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-slate-100 pb-6">
                <div>
                    <h2 class="text-xl font-extrabold text-slate-900">Hubungi Operasional Mitra Irigasi</h2>
                    <p class="text-xs text-slate-500 mt-1">Lini Usaha Spesialis Irigasi oleh CV. Wijaya Karya (www.mitra-irigasi.com)</p>
                </div>
                <a href="https://wa.me/6282142010020?text=Halo%20Admin%20Mitra%20Irigasi,%20saya%20ingin%20bertanya%20mengenai%20peralatan%20irigasi" target="_blank" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs px-5 py-3 rounded-xl shadow-md shadow-emerald-200 transition flex items-center gap-2 shrink-0">
                    <span>Chat Admin WA (0821-4201-0020)</span>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24">
                        <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                    </svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 text-xs sm:text-sm">
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 space-y-1">
                    <strong class="block text-slate-900 font-bold mb-1">📍 Alamat Kantor Operasional</strong>
                    <p class="text-slate-600">Jl. Laguna Raya L6 no.11-15, Pakuwon City, Kejawan Putih, Mulyorejo, Surabaya, Jawa Timur, 60112</p>
                    <span class="inline-block text-[11px] text-emerald-700 font-semibold mt-1">CV. Wijaya Karya</span>
                </div>
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 space-y-1">
                    <strong class="block text-slate-900 font-bold mb-1">📲 WhatsApp & Layanan Hotline</strong>
                    <p class="text-slate-600">082142010020 (Fast Response)</p>
                    <p class="text-slate-500 text-[11px] mt-1">Senin – Sabtu (08.00 – 17.00 WIB)</p>
                </div>
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 space-y-1">
                    <strong class="block text-slate-900 font-bold mb-1">✉️ Email & Website Resmi</strong>
                    <p class="text-slate-600 font-medium">mitrairigasi.id@gmail.com</p>
                    <p class="text-emerald-700 font-semibold text-[11px]">www.mitra-irigasi.com</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection