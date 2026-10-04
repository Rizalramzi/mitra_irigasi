@extends('layouts.app')

@section('title', 'Tentang Kami - Mitra Irigasi Indonesia')
@section('meta_description', 'Profil dan komitmen Mitra Irigasi sebagai spesialis penyedia teknologi dan peralatan irigasi presisi untuk petani & pengelola kebun di Indonesia.')
@section('meta_keywords', 'tentang mitra irigasi, profile mitra irigasi, supplier irigasi indonesia, penyedia sprinkler, distributor drip irrigation')

@push('scripts')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@type": "AboutPage",
  "name": "Tentang Mitra Irigasi",
  "description": "Spesialis teknologi dan perlengkapan irigasi presisi untuk petani dan pengelola kebun di seluruh Indonesia.",
  "url": "https://mitra-irigasi.com/about"
}
</script>
@endpush

@section('content')
<div class="py-10 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-12">
        
        <!-- 1. HERO SECTION -->
        <div class="bg-linear-to-br from-emerald-900 via-emerald-800 to-slate-900 text-white rounded-3xl p-8 sm:p-14 shadow-xl relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="max-w-2xl relative z-10 space-y-4">
                <span class="inline-block bg-emerald-700/60 text-emerald-200 border border-emerald-500/40 text-xs font-bold px-3.5 py-1.5 rounded-full tracking-wider uppercase">
                    Mitra Irigasi Indonesia
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold tracking-tight leading-tight">
                    Mendorong Modernisasi <br>
                    <span class="text-emerald-400">Pengairan Pertanian Indonesia</span>
                </h1>
                <p class="text-emerald-100/90 text-sm sm:text-base leading-relaxed">
                    <strong class="text-white">Mitra Irigasi</strong> (www.mitra-irigasi.com) adalah penyedia spesialis teknologi dan perlengkapan irigasi presisi untuk petani, pengelola kebun, dan instansi di seluruh Indonesia. Kami berkomitmen mewujudkan pengairan lahan yang efisien, hemat air, hemat biaya, dan mudah dioperasikan.
                </p>
            </div>
            <div class="relative z-10 shrink-0 bg-white/10 backdrop-blur-md p-6 rounded-3xl border border-white/20 shadow-2xl text-center">
                <img src="{{ asset('storage/logo_mitra_irigasi.png') }}" alt="Logo Mitra Irigasi" class="w-36 h-36 object-contain mx-auto drop-shadow-md">
                <span class="block text-white font-extrabold text-lg mt-2">MITRA IRIGASI</span>
                <span class="text-emerald-200 text-xs font-semibold block">Solusi Air Pertanian Modern</span>
            </div>
        </div>

        <!-- 2. COMPANY PROFILE & LATAR BELAKANG -->
        <div class="bg-white rounded-3xl p-8 sm:p-12 border border-slate-200 shadow-sm">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                <div class="lg:col-span-7 space-y-4">
                    <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block">
                        Company Profile Mitra Irigasi
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 leading-snug">
                        Mitra Terpercaya Solusi Irigasi & Pengairan Pertanian Presisi
                    </h2>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        <strong class="text-slate-900">Mitra Irigasi</strong> hadir khusus untuk mendukung modernisasi sektor pertanian Indonesia melalui penyediaan komponen pengairan berkualitas tinggi. Kami membantu petani mengatasi tantangan efisiensi air, tenaga kerja, dan pemerataan nutrisi tanaman dengan teknologi pengairan modern yang tepat guna.
                    </p>
                    <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">
                        Produk unggulan kami melingkupi sistem *drip irrigation*, *micro sprinkler*, *solenoid valve*, *controller otomatis*, *filtrasi*, serta berbagai jenis pipa dan konektor presisi yang tahan sinar matahari (UV) dan paparan pupuk cair.
                    </p>
                </div>

                <!-- STATISTIK PENCAPAIAN -->
                <div class="lg:col-span-5 bg-slate-50 p-6 sm:p-8 rounded-2xl border border-slate-200 grid grid-cols-2 gap-6 text-center">
                    <div class="p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="block text-2xl sm:text-3xl font-black text-emerald-600">100%</span>
                        <span class="text-[11px] font-semibold text-slate-500 uppercase mt-1 block">Produk Original</span>
                    </div>
                    <div class="p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="block text-2xl sm:text-3xl font-black text-slate-900">Nego WA</span>
                        <span class="text-[11px] font-semibold text-slate-500 uppercase mt-1 block">Penawaran Transparan</span>
                    </div>
                    <div class="p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="block text-2xl sm:text-3xl font-black text-slate-900">Konsultasi</span>
                        <span class="text-[11px] font-semibold text-slate-500 uppercase mt-1 block">Bimbingan Teknis</span>
                    </div>
                    <div class="p-4 bg-white rounded-xl border border-slate-100 shadow-sm">
                        <span class="block text-2xl sm:text-3xl font-black text-emerald-600">Nasional</span>
                        <span class="text-[11px] font-semibold text-slate-500 uppercase mt-1 block">Pengiriman Seluruh RI</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3. VISI PERUSAHAAN (SESUAI FITUR DOKUMEN) -->
        <div class="bg-linear-to-br from-slate-900 via-slate-800 to-emerald-950 text-white p-8 sm:p-12 rounded-3xl shadow-xl space-y-6">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center font-bold text-2xl shadow-lg shadow-emerald-900">
                    🎯
                </div>
                <div>
                    <span class="text-xs font-bold text-emerald-400 uppercase tracking-widest block">Mitra Irigasi</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-white">Visi Perusahaan</h2>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-2">
                <div class="bg-white/5 border border-white/10 p-6 rounded-2xl space-y-3">
                    <div class="w-8 h-8 bg-emerald-500/20 text-emerald-300 rounded-lg flex items-center justify-center font-bold text-sm">
                        1
                    </div>
                    <p class="text-slate-200 text-sm sm:text-base leading-relaxed font-medium">
                        Menyediakan sarana irigasi modern bagi petani lokal Indonesia dengan tehnologi tepat guna, harga terjangkau dan mudah aplikasinya.
                    </p>
                </div>

                <div class="bg-white/5 border border-white/10 p-6 rounded-2xl space-y-3">
                    <div class="w-8 h-8 bg-emerald-500/20 text-emerald-300 rounded-lg flex items-center justify-center font-bold text-sm">
                        2
                    </div>
                    <p class="text-slate-200 text-sm sm:text-base leading-relaxed font-medium">
                        Memberikan bimbingan dan konsultasi sistem irigasi modern kepada petani lokal Indonesia.
                    </p>
                </div>
            </div>
        </div>

        <!-- 4. LINK SOCIAL MEDIA (WHATSAPP, TIKTOK, INSTAGRAM) -->
        <div class="bg-white rounded-3xl p-8 sm:p-10 border border-slate-200 shadow-sm space-y-6">
            <div class="text-center max-w-2xl mx-auto">
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block">Terhubung Dengan Kami</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">Layanan & Sosial Media Mitra Irigasi</h2>
                <p class="text-slate-500 text-xs sm:text-sm mt-2">Dapatkan informasi produk terbaru, panduan edukasi irigasi, serta konsultasi gratis via media sosial kami.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 pt-4">
                <!-- WHATSAPP -->
                <a href="https://wa.me/6282142010020?text=Halo%20Admin%20Mitra%20Irigasi,%20saya%20ingin%20bertanya%20mengenai%20peralatan%20irigasi" target="_blank" class="p-6 bg-emerald-50 hover:bg-emerald-100/80 border border-emerald-200 rounded-2xl transition group flex flex-col items-center text-center space-y-3 shadow-xs">
                    <div class="w-14 h-14 bg-emerald-600 text-white rounded-2xl flex items-center justify-center shadow-md shadow-emerald-200 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                            <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/>
                        </svg>
                    </div>
                    <div>
                        <strong class="block text-slate-900 font-extrabold text-base">WhatsApp Admin</strong>
                        <span class="text-emerald-700 font-bold text-xs mt-0.5 block">0821-4201-0020</span>
                        <p class="text-slate-500 text-[11px] mt-1">Konsultasi & Penawaran Harga Langsung</p>
                    </div>
                </a>

                <!-- TIKTOK -->
                <a href="https://www.tiktok.com/@mitrairigasi" target="_blank" class="p-6 bg-slate-100 hover:bg-slate-200/80 border border-slate-200 rounded-2xl transition group flex flex-col items-center text-center space-y-3 shadow-xs">
                    <div class="w-14 h-14 bg-slate-900 text-white rounded-2xl flex items-center justify-center shadow-md shadow-slate-300 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                            <path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.97-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.29-2.63.74-5.26 2.72-6.99 1.34-1.17 3.07-1.83 4.85-1.84.28 0 .56.02.84.05v4.06c-.46-.08-.93-.11-1.4-.07-1.04.09-2.06.6-2.67 1.45-.66.92-.85 2.14-.52 3.22.31 1.07 1.2 1.93 2.29 2.21.96.25 2.02.09 2.87-.45.92-.58 1.48-1.61 1.52-2.7.04-3.6.01-7.2.02-10.8z"/>
                        </svg>
                    </div>
                    <div>
                        <strong class="block text-slate-900 font-extrabold text-base">TikTok Official</strong>
                        <span class="text-slate-700 font-bold text-xs mt-0.5 block">@mitrairigasi</span>
                        <p class="text-slate-500 text-[11px] mt-1">Video Tutorial & Simulasi Pengairan</p>
                    </div>
                </a>

                <!-- INSTAGRAM -->
                <a href="https://www.instagram.com/mitrairigasi" target="_blank" class="p-6 bg-pink-50 hover:bg-pink-100/80 border border-pink-200 rounded-2xl transition group flex flex-col items-center text-center space-y-3 shadow-xs">
                    <div class="w-14 h-14 bg-linear-to-tr from-amber-500 via-rose-500 to-purple-600 text-white rounded-2xl flex items-center justify-center shadow-md shadow-rose-200 group-hover:scale-110 transition-transform">
                        <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </div>
                    <div>
                        <strong class="block text-slate-900 font-extrabold text-base">Instagram</strong>
                        <span class="text-rose-600 font-bold text-xs mt-0.5 block">@mitrairigasi</span>
                        <p class="text-slate-500 text-[11px] mt-1">Galeri Proyek & Update Produk</p>
                    </div>
                </a>
            </div>
        </div>

        <!-- 5. INFORMASI KONTAK MITRA IRIGASI -->
        <div class="bg-white rounded-3xl p-8 border border-slate-200 shadow-sm space-y-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 border-b border-slate-100 pb-6">
                <div>
                    <h2 class="text-xl font-extrabold text-slate-900">Hubungi Operasional Mitra Irigasi</h2>
                    <p class="text-xs text-slate-500 mt-1">Layanan Informasi & Konsultasi Spesialis Irigasi (www.mitra-irigasi.com)</p>
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
                    <strong class="block text-slate-900 font-bold mb-1">📍 Alamat Operasional</strong>
                    <p class="text-slate-600">Jl. Laguna Raya L6 no.11-15, Pakuwon City, Kejawan Putih, Mulyorejo, Surabaya, Jawa Timur, 60112</p>
                </div>
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 space-y-1">
                    <strong class="block text-slate-900 font-bold mb-1">📲 WhatsApp & Hotline</strong>
                    <p class="text-slate-600 font-bold">0821-4201-0020 (Fast Response)</p>
                    <p class="text-slate-500 text-[11px] mt-1">Senin – Sabtu (08.00 – 17.00 WIB)</p>
                </div>
                <div class="p-4 bg-slate-50 rounded-2xl border border-slate-100 space-y-1">
                    <strong class="block text-slate-900 font-bold mb-1">✉️ Email & Website</strong>
                    <p class="text-slate-600 font-medium">mitrairigasi.id@gmail.com</p>
                    <p class="text-emerald-700 font-semibold text-[11px]">www.mitra-irigasi.com</p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection