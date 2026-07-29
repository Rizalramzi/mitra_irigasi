@extends('layouts.app')

@section('title', 'Panduan & Edukasi Teknik Irigasi - Mitra Irigasi')

@section('content')
<div x-data="guidesData()" class="py-10 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- BREADCRUMB & HEADER SECTION -->
        <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-sm mb-12">
            <div class="max-w-3xl">
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block mb-1">
                    Edukasi & Panduan Praktis
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Panduan Teknis Irigasi Lahan
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-2 leading-relaxed">
                    Temukan panduan langkah demi langkah pembuatan sistem irigasi otomatis serta tutorial penggunaan alat-alat pengairan Mitra Irigasi.
                </p>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- SECTION 1: STARTER KIT & PANDUAN TEKS (STEP BY STEP) -->
        <!-- ========================================== -->
        <div class="mb-16">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 gap-4">
                <div>
                    <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block mb-1">
                        Section 01
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                        Starter Kit & Proyek DIY Irigasi
                    </h2>
                    <p class="text-slate-500 text-xs sm:text-sm mt-1">
                        Panduan praktis perakitan dan sistem otomasi pengairan sederhana untuk kebun & lahan Anda.
                    </p>
                </div>

                <!-- TAB SWITCHER PROYEK -->
                <div class="flex items-center gap-2 bg-slate-200/80 p-1.5 rounded-2xl self-start sm:self-auto overflow-x-auto max-w-full">
                    <button 
                        @click="activeTab = 'otomatis'" 
                        :class="activeTab === 'otomatis' ? 'bg-white text-emerald-700 shadow-sm font-extrabold' : 'text-slate-600 font-semibold hover:text-slate-900'"
                        class="px-4 py-2 rounded-xl text-xs transition whitespace-nowrap cursor-pointer"
                    >
                        ⚡ Irigasi Otomatis Sederhana
                    </button>
                    <button 
                        @click="activeTab = 'drip'" 
                        :class="activeTab === 'drip' ? 'bg-white text-emerald-700 shadow-sm font-extrabold' : 'text-slate-600 font-semibold hover:text-slate-900'"
                        class="px-4 py-2 rounded-xl text-xs transition whitespace-nowrap cursor-pointer"
                    >
                        💧 Rakit Drip Line Kebun
                    </button>
                </div>
            </div>

            <!-- CONTENT PROYEK 1: IRIGASI OTOMATIS SEDERHANA -->
            <div x-show="activeTab === 'otomatis'" x-transition class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-sm">
                <div class="flex items-center gap-3 mb-6 pb-6 border-b border-slate-100">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center font-extrabold text-xl shadow-inner">
                        🛠️
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-extrabold text-slate-900">Proyek: Membuat Pertanian Otomatis Sederhana</h3>
                        <p class="text-slate-500 text-xs">Mengatur penyiraman tanaman secara otomatis menggunakan timer digital dan solenoid valve.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- ALAT & BAHAN -->
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200/80">
                        <h4 class="text-xs font-extrabold text-slate-800 uppercase tracking-wider mb-4 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Alat & Bahan Yang Dibutuhkan
                        </h4>
                        <ul class="space-y-3 text-xs text-slate-700">
                            <li class="flex items-start gap-2.5">
                                <span class="text-emerald-600 font-bold">✓</span>
                                <div>
                                    <strong class="block text-slate-900">Timer Digital 220V / Battery</strong>
                                    <span class="text-[11px] text-slate-500">Pengatur jadwal waktu siram.</span>
                                </div>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="text-emerald-600 font-bold">✓</span>
                                <div>
                                    <strong class="block text-slate-900">Solenoid Valve 3/4 Inch</strong>
                                    <span class="text-[11px] text-slate-500">Kran listrik pembuka/penutup aliran air.</span>
                                </div>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="text-emerald-600 font-bold">✓</span>
                                <div>
                                    <strong class="block text-slate-900">Disc Filter 3/4 Inch</strong>
                                    <span class="text-[11px] text-slate-500">Mencegah kotoran menyumbat katup & nozzle.</span>
                                </div>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="text-emerald-600 font-bold">✓</span>
                                <div>
                                    <strong class="block text-slate-900">Pipa Utama PE / PVC & Connector</strong>
                                    <span class="text-[11px] text-slate-500">Penyalur air ke titik tanaman.</span>
                                </div>
                            </li>
                        </ul>

                        <div class="mt-6 pt-4 border-t border-slate-200">
                            <a href="{{ route('katalog') }}" class="text-xs font-bold text-emerald-600 hover:text-emerald-700 flex items-center gap-1">
                                <span>Cari alat ini di Katalog Produk</span>
                                <span>→</span>
                            </a>
                        </div>
                    </div>

                    <!-- LANGKAH-LANGKAH PENGERJAAN -->
                    <div class="lg:col-span-2 space-y-6">
                        <h4 class="text-xs font-extrabold text-slate-800 uppercase tracking-wider flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Langkah-Langkah Pembuatan
                        </h4>

                        <div class="space-y-4">
                            <!-- STEP 1 -->
                            <div class="flex gap-4">
                                <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow-md shadow-emerald-100">
                                    1
                                </div>
                                <div class="space-y-1 pt-0.5">
                                    <h5 class="text-xs font-bold text-slate-900">Pemasangan Unit Filtrasi Air</h5>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        Pasang **Disc Filter** di bagian paling awal sumber air (setelah pompa/toren) sebelum masuk ke komponen elektrikal. Pastikan arah panah aliran air pada filter sesuai.
                                    </p>
                                </div>
                            </div>

                            <!-- STEP 2 -->
                            <div class="flex gap-4">
                                <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow-md shadow-emerald-100">
                                    2
                                </div>
                                <div class="space-y-1 pt-0.5">
                                    <h5 class="text-xs font-bold text-slate-900">Instalasi Katup Solenoid Valve & Timer</h5>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        Hubungkan output kabel dari **Timer Digital** ke terminal **Solenoid Valve**. Atur program jam siram pada timer (contoh: Pagi jam 07.00 selama 15 menit dan Sore jam 16.00 selama 15 menit).
                                    </p>
                                </div>
                            </div>

                            <!-- STEP 3 -->
                            <div class="flex gap-4">
                                <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow-md shadow-emerald-100">
                                    3
                                </div>
                                <div class="space-y-1 pt-0.5">
                                    <h5 class="text-xs font-bold text-slate-900">Penyambungan Pipa Distribusi ke Lahan</h5>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        Sambungkan pipa PE dari keluaran solenoid menuju barisan tanaman. Pasang penutup pipa (end cap) di ujung akhir pipa agar tekanan air stabil.
                                    </p>
                                </div>
                            </div>

                            <!-- STEP 4 -->
                            <div class="flex gap-4">
                                <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow-md shadow-emerald-100">
                                    4
                                </div>
                                <div class="space-y-1 pt-0.5">
                                    <h5 class="text-xs font-bold text-slate-900">Uji Coba System & Flushing</h5>
                                    <p class="text-xs text-slate-600 leading-relaxed">
                                        Buka ujung pipa lalu jalankan sistem selama 1 menit untuk membilas sisa kotoran pengerjaan. Setelah itu tutup kembali dan sistem siap beroperasi otomatis.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONTENT PROYEK 2: RAKIT DRIP LINE KEBUN -->
            <div x-show="activeTab === 'drip'" x-transition class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-sm">
                <div class="flex items-center gap-3 mb-6 pb-6 border-b border-slate-100">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center font-extrabold text-xl shadow-inner">
                        🌱
                    </div>
                    <div>
                        <h3 class="text-lg sm:text-xl font-extrabold text-slate-900">Proyek: Perakitan Selang Drip Line Kebun Hortikultura</h3>
                        <p class="text-slate-500 text-xs">Instalasi jalur penyiraman tetes hemat air efisien untuk tanaman cabai, melon, atau tomat.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- ALAT & BAHAN -->
                    <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200/80">
                        <h4 class="text-xs font-extrabold text-slate-800 uppercase tracking-wider mb-4 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Alat & Bahan
                        </h4>
                        <ul class="space-y-3 text-xs text-slate-700">
                            <li class="flex items-start gap-2.5">
                                <span class="text-emerald-600 font-bold">✓</span>
                                <div>
                                    <strong class="block text-slate-900">Selang Drip Tape / PE 16mm</strong>
                                </div>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="text-emerald-600 font-bold">✓</span>
                                <div>
                                    <strong class="block text-slate-900">Offtake Connector + Rubber Ring</strong>
                                </div>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="text-emerald-600 font-bold">✓</span>
                                <div>
                                    <strong class="block text-slate-900">Pelubang Pipa (Punch Tool 8mm)</strong>
                                </div>
                            </li>
                            <li class="flex items-start gap-2.5">
                                <span class="text-emerald-600 font-bold">✓</span>
                                <div>
                                    <strong class="block text-slate-900">Dripper / Emitter Adjustable</strong>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- LANGKAH-LANGKAH -->
                    <div class="lg:col-span-2 space-y-4">
                        <h4 class="text-xs font-extrabold text-slate-800 uppercase tracking-wider flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Langkah Perakitan
                        </h4>
                        <div class="space-y-3 text-xs text-slate-600 leading-relaxed">
                            <p>1. **Lubangi Pipa Utama (PVC/PE):** Gunakan *Punch Tool* ukuran 8mm untuk membuat lubang konektor pada pipa pembagi utama.</p>
                            <p>2. **Pasang Karet Offtake & Connector:** Masukkan karet seal (*grommet*) lalu tancapkan *offtake valve* hingga terdengar bunyi klik rapat.</p>
                            <p>3. **Gelar Selang Drip:** Bentangkan selang drip sejajar bedengan tanaman. Tancapkan emitter/dripper tepat di dekat perakaran masing-masing tanaman.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ========================================== -->
        <!-- SECTION 2: VIDEO PANDUAN PENGGUNAAN ALAT -->
        <!-- ========================================== -->
        <div class="pt-8 border-t border-slate-200">
            <div class="mb-8">
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block mb-1">
                    Section 02
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                    Video Penggunaan Alat Mitra Irigasi
                </h2>
                <p class="text-slate-500 text-xs sm:text-sm mt-1">
                    Tonton video demonstrasi dan panduan pengoperasian komponen irigasi secara detail.
                </p>
            </div>

            <!-- GRID VIDEO TUTORIAL -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- VIDEO 1 -->
                <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div 
                            class="relative aspect-video bg-slate-900 cursor-pointer overflow-hidden flex flex-col items-center justify-center p-6 text-white group-hover:brightness-105 transition" 
                            @click="openVideo('https://www.youtube.com/embed/vYuoECsqZy8')"
                        >
                            <div class="w-14 h-14 bg-emerald-600/90 group-hover:bg-emerald-600 backdrop-blur-md text-white rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform mb-2">
                                <svg class="w-7 h-7 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                            <span class="text-[10px] font-extrabold text-emerald-400 uppercase tracking-widest bg-emerald-950/80 px-2.5 py-1 rounded-md border border-emerald-800">
                                Putar Video
                            </span>
                        </div>
                        <div class="p-6 space-y-2">
                            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider block">Video Alat #01</span>
                            <h3 class="font-extrabold text-slate-900 text-base leading-snug group-hover:text-emerald-600 transition">
                                Cara Kalibrasi & Setting Timer Irigasi Digital
                            </h3>
                            <p class="text-slate-500 text-xs leading-relaxed">
                                Petunjuk lengkap menyetting jam, durasi siram, dan penggantian baterai pada controller timer irigasi otomatis.
                            </p>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                        <span>Durasi: 05:20</span>
                        <span class="text-emerald-700 font-bold">Timer Controller</span>
                    </div>
                </div>

                <!-- VIDEO 2 -->
                <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div 
                            class="relative aspect-video bg-slate-900 cursor-pointer overflow-hidden flex flex-col items-center justify-center p-6 text-white group-hover:brightness-105 transition" 
                            @click="openVideo('https://www.youtube.com/embed/vYuoECsqZy8')"
                        >
                            <div class="w-14 h-14 bg-emerald-600/90 group-hover:bg-emerald-600 backdrop-blur-md text-white rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform mb-2">
                                <svg class="w-7 h-7 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                            <span class="text-[10px] font-extrabold text-emerald-400 uppercase tracking-widest bg-emerald-950/80 px-2.5 py-1 rounded-md border border-emerald-800">
                                Putar Video
                            </span>
                        </div>
                        <div class="p-6 space-y-2">
                            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider block">Video Alat #02</span>
                            <h3 class="font-extrabold text-slate-900 text-base leading-snug group-hover:text-emerald-600 transition">
                                Cara Backwash & Pembersihan Disc Filter
                            </h3>
                            <p class="text-slate-500 text-xs leading-relaxed">
                                Panduan membongkar ring piringan disc filter untuk dibersihkan dari endapan lumpur agar aliran air kembali kencang.
                            </p>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                        <span>Durasi: 04:15</span>
                        <span class="text-emerald-700 font-bold">Filter Irigasi</span>
                    </div>
                </div>

                <!-- VIDEO 3 -->
                <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                    <div>
                        <div 
                            class="relative aspect-video bg-slate-900 cursor-pointer overflow-hidden flex flex-col items-center justify-center p-6 text-white group-hover:brightness-105 transition" 
                            @click="openVideo('https://www.youtube.com/embed/vYuoECsqZy8')"
                        >
                            <div class="w-14 h-14 bg-emerald-600/90 group-hover:bg-emerald-600 backdrop-blur-md text-white rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform mb-2">
                                <svg class="w-7 h-7 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                            </div>
                            <span class="text-[10px] font-extrabold text-emerald-400 uppercase tracking-widest bg-emerald-950/80 px-2.5 py-1 rounded-md border border-emerald-800">
                                Putar Video
                            </span>
                        </div>
                        <div class="p-6 space-y-2">
                            <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider block">Video Alat #03</span>
                            <h3 class="font-extrabold text-slate-900 text-base leading-snug group-hover:text-emerald-600 transition">
                                Pengaturan Debit Air Micro Sprinkler & Fogger
                            </h3>
                            <p class="text-slate-500 text-xs leading-relaxed">
                                Cara memutar head sprinkler untuk mengatur jangkauan radius kabut semprotan sesuai lebar lahan kebun.
                            </p>
                        </div>
                    </div>
                    <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                        <span>Durasi: 06:40</span>
                        <span class="text-emerald-700 font-bold">Sprinkler & Nozzle</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- MODAL POPUP PLAYER VIDEO TUTORIAL -->
    <div 
        x-show="videoModal.show" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/80 backdrop-blur-md"
        style="display: none;"
    >
        <div @click.away="closeVideo()" class="bg-black rounded-3xl max-w-4xl w-full overflow-hidden shadow-2xl relative border border-slate-800">
            <button @click="closeVideo()" class="absolute top-4 right-4 text-white bg-slate-800/80 hover:bg-slate-700 p-2.5 rounded-full z-10 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="aspect-video w-full">
                <iframe :src="videoModal.url" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>

<script>
    function guidesData() {
        return {
            activeTab: 'otomatis',
            videoModal: {
                show: false,
                url: ''
            },
            openVideo(url) {
                this.videoModal.url = url;
                this.videoModal.show = true;
            },
            closeVideo() {
                this.videoModal.show = false;
                this.videoModal.url = '';
            }
        }
    }
</script>
@endsection