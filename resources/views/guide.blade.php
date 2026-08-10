@extends('layouts.app')

@section('title', 'Panduan & Edukasi Teknik Irigasi - Mitra Irigasi')

@section('content')
<div x-data="guidesApp()" class="py-10 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- HEADER SECTION -->
        <div class="bg-white rounded-3xl p-6 sm:p-10 border border-slate-200 shadow-sm mb-12">
            <div class="max-w-3xl">
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block mb-1">
                    Edukasi & Panduan Praktis
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Panduan Teknis Irigasi Lahan
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-2 leading-relaxed">
                    Pilih modul kit tutorial di bawah ini untuk melihat daftar alat, bahan, dan panduan pengerjaan langkah demi langkah.
                </p>
            </div>
        </div>

        <!-- SECTION 1: STARTER KIT CARDS -->
        <div class="mb-16">
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block mb-1">
                        Section 01
                    </span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                        Starter Kit & Proyek DIY Irigasi
                    </h2>
                </div>
                <span class="text-xs text-slate-400 font-semibold hidden sm:block">
                    Klik kartu untuk membuka detail tutorial
                </span>
            </div>

            <!-- GRID ROW STARTER KIT -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($starterKits as $kit)
                    <div 
                        @click="openKitModal({{ json_encode($kit) }})"
                        class="bg-white rounded-3xl border border-slate-200 p-6 shadow-sm hover:shadow-xl hover:border-emerald-500/50 transition-all duration-300 cursor-pointer flex flex-col justify-between group relative overflow-hidden"
                    >
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div class="w-12 h-12 bg-emerald-50 text-emerald-700 rounded-2xl flex items-center justify-center font-extrabold text-2xl shadow-inner group-hover:scale-110 transition-transform">
                                    {{ $kit->icon ?? '🛠️' }}
                                </div>
                                <span class="text-[10px] font-extrabold text-emerald-700 bg-emerald-100 px-2.5 py-1 rounded-full uppercase tracking-wider">
                                    {{ $kit->category }}
                                </span>
                            </div>

                            <div>
                                <h3 class="text-base font-extrabold text-slate-900 group-hover:text-emerald-600 transition leading-snug">
                                    {{ $kit->title }}
                                </h3>
                                <p class="text-slate-500 text-xs mt-2 line-clamp-2 leading-relaxed">
                                    {{ $kit->subtitle }}
                                </p>
                            </div>
                        </div>

                        <div class="pt-5 mt-5 border-t border-slate-100 flex items-center justify-between text-xs">
                            <span class="text-slate-400 font-medium text-[11px]">{{ $kit->duration }}</span>
                            <span class="font-bold text-emerald-600 group-hover:translate-x-1 transition-transform flex items-center gap-1">
                                <span>Buka Tutorial</span>
                                <span>→</span>
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- SECTION 2: VIDEO TUTORIAL -->
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

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($videos as $video)
                    <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between group">
                        <div>
                            <div 
                                class="relative aspect-video bg-slate-900 cursor-pointer overflow-hidden flex flex-col items-center justify-center p-6 text-white group-hover:brightness-105 transition" 
                                @click="openVideo('{{ $video->youtube_url }}')"
                            >
                                <div class="w-14 h-14 bg-emerald-600/90 group-hover:bg-emerald-600 backdrop-blur-md text-white rounded-2xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform mb-2">
                                    <svg class="w-7 h-7 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                </div>
                                <span class="text-[10px] font-extrabold text-emerald-400 uppercase tracking-widest bg-emerald-950/80 px-2.5 py-1 rounded-md border border-emerald-800">
                                    Putar Video
                                </span>
                            </div>
                            <div class="p-6 space-y-2">
                                <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider block">{{ $video->category }}</span>
                                <h3 class="font-extrabold text-slate-900 text-base leading-snug group-hover:text-emerald-600 transition">
                                    {{ $video->title }}
                                </h3>
                                <p class="text-slate-500 text-xs leading-relaxed">
                                    {{ $video->subtitle }}
                                </p>
                            </div>
                        </div>
                        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-between text-xs font-semibold text-slate-500">
                            <span>Durasi: {{ $video->duration }}</span>
                            <span class="text-emerald-700 font-bold">{{ $video->category }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    <!-- MODAL STARTER KIT TUTORIAL -->
    <div 
        x-show="kitModal.show" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm"
        style="display: none;"
    >
        <div @click.away="kitModal.show = false" class="bg-white rounded-3xl max-w-3xl w-full p-6 sm:p-8 shadow-2xl relative overflow-hidden max-h-[90vh] overflow-y-auto border border-slate-100">
            <button @click="kitModal.show = false" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 bg-slate-100 p-2 rounded-full transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <div class="space-y-6">
                <div class="flex items-center gap-3 border-b border-slate-100 pb-5 pr-8">
                    <div class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-2xl flex items-center justify-center font-extrabold text-2xl shrink-0">
                        <span x-text="kitModal.data.icon || '🛠️'"></span>
                    </div>
                    <div>
                        <span class="text-[10px] font-extrabold text-emerald-600 uppercase tracking-widest" x-text="kitModal.data.category"></span>
                        <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-snug" x-text="kitModal.data.title"></h2>
                        <p class="text-xs text-slate-500 mt-1" x-text="kitModal.data.subtitle"></p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-slate-50 p-5 rounded-2xl border border-slate-200/80 space-y-4">
                        <h4 class="text-xs font-extrabold text-slate-800 uppercase tracking-wider flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Alat & Bahan
                        </h4>
                        <ul class="space-y-3 text-xs text-slate-700">
                            <template x-for="(item, idx) in kitModal.data.tools_and_materials" :key="idx">
                                <li class="flex items-start gap-2">
                                    <span class="text-emerald-600 font-bold">✓</span>
                                    <div>
                                        <strong class="block text-slate-900" x-text="item.name"></strong>
                                        <span class="text-[11px] text-slate-500" x-text="item.desc"></span>
                                    </div>
                                </li>
                            </template>
                        </ul>
                    </div>

                    <div class="md:col-span-2 space-y-4">
                        <h4 class="text-xs font-extrabold text-slate-800 uppercase tracking-wider flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Langkah-Langkah Pengerjaan
                        </h4>

                        <div class="space-y-4">
                            <template x-for="(step, sIdx) in kitModal.data.steps" :key="sIdx">
                                <div class="flex gap-3">
                                    <div class="w-7 h-7 rounded-xl bg-emerald-600 text-white font-extrabold text-xs flex items-center justify-center shrink-0 shadow-sm mt-0.5" x-text="sIdx + 1"></div>
                                    <div class="space-y-0.5">
                                        <h5 class="text-xs font-bold text-slate-900" x-text="step.title"></h5>
                                        <p class="text-xs text-slate-600 leading-relaxed" x-text="step.description"></p>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex justify-between items-center">
                    <span class="text-xs text-slate-400" x-text="kitModal.data.duration"></span>
                    <a href="{{ route('katalog') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold px-4 py-2.5 rounded-xl transition">
                        Cari Alat di Katalog
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL VIDEO PLAYER -->
    <div 
        x-show="videoModal.show" 
        x-transition
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
    function guidesApp() {
        return {
            kitModal: {
                show: false,
                data: {}
            },
            videoModal: {
                show: false,
                url: ''
            },
            openKitModal(kitData) {
                this.kitModal.data = kitData;
                this.kitModal.show = true;
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