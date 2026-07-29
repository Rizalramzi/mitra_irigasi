@extends('layouts.app')

@section('title', 'Katalog Peralatan Irigasi - Mitra Irigasi')

@section('content')
@php
    $userCart = [];
    if(Auth::check()) {
        $userCart = \App\Models\Cart::where('user_id', Auth::id())
                    ->pluck('quantity', 'product_id')
                    ->toArray();
    }
@endphp

<div x-data="katalogData({{ json_encode($userCart) }})" class="py-8 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- HEADER SECTION -->
        <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm mb-8">
            <div class="max-w-3xl">
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block mb-1">
                    Peralatan Irigasi Lahan & Kebun
                </span>
                <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 tracking-tight">
                    Katalog Komponen Pengairan
                </h1>
                <p class="text-slate-500 text-xs sm:text-sm mt-2 leading-relaxed">
                    Pilih komponen irigasi yang Anda perlukan, tambahkan ke keranjang, lalu ajukan draf penawaran harga secara cepat via WhatsApp Admin CV. Wijaya Karya.
                </p>
            </div>

            <!-- SEARCH BAR & FILTER CATEGORY (AJAX - INSTANT REFRESH) -->
            <div class="mt-6 pt-6 border-t border-slate-100 flex flex-col gap-4">
                <div class="relative w-full">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </span>
                    <input 
                        type="text" 
                        x-model="search"
                        @input.debounce.300ms="filterCategory(currentCategory)"
                        placeholder="Ketik nama alat atau kode untuk mencari (otomatis)..." 
                        class="w-full pl-10 pr-10 py-3 bg-slate-50 border border-slate-200 rounded-2xl text-xs sm:text-sm focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:bg-white transition"
                    >
                    <!-- SPINNER KECIL DI DALAM SEARCH BAR SAAT MENGETIK -->
                    <div x-show="loading" class="absolute inset-y-0 right-0 flex items-center pr-3.5 pointer-events-none" style="display: none;">
                        <svg class="animate-spin h-4 w-4 text-emerald-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </div>

                <!-- FILTER TOMBOL KATEGORI INSTAN -->
                <div class="flex flex-wrap items-center gap-2 pt-1">
                    <button 
                        @click="filterCategory('all')" 
                        :class="currentCategory === 'all' ? 'bg-emerald-600 text-white font-bold shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'"
                        class="px-4 py-2.5 rounded-xl text-xs transition cursor-pointer flex items-center gap-2"
                    >
                        <span>Semua Produk</span>
                        <template x-if="loading && currentCategory === 'all'">
                            <svg class="animate-spin h-3.5 w-3.5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </template>
                    </button>

                    @foreach($categories as $category)
                        <button 
                            @click="filterCategory('{{ $category->slug }}')" 
                            :class="currentCategory === '{{ $category->slug }}' ? 'bg-emerald-600 text-white font-bold shadow-sm' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-semibold'"
                            class="px-4 py-2.5 rounded-xl text-xs transition cursor-pointer flex items-center gap-1.5"
                        >
                            <span>{{ $category->name }}</span>
                            <span x-show="!(loading && currentCategory === '{{ $category->slug }}')" class="bg-black/10 px-1.5 py-0.2 text-[10px] rounded-full">
                                {{ $category->products_count }}
                            </span>
                            <!-- Spinner di Tombol Kategori Aktif -->
                            <template x-if="loading && currentCategory === '{{ $category->slug }}'">
                                <svg class="animate-spin h-3.5 w-3.5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </template>
                        </button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- NOTIFIKASI TOAST -->
        <div x-show="toast.show" x-transition class="fixed bottom-5 right-5 bg-emerald-800 text-white px-5 py-3 rounded-2xl shadow-2xl flex items-center gap-3 z-50 text-xs sm:text-sm font-bold border border-emerald-600" style="display: none;">
            <span class="text-base">✓</span>
            <span x-text="toast.message"></span>
        </div>

        <!-- CONTAINER GRID PRODUK DENGAN OVERLAY LOADING CIRCLE -->
        <div class="relative min-h-87.5">
            <!-- OVERLAY LOADING CIRCLE UTAMA (GLASSMORPHISM EFFECT) -->
            <div 
                x-show="loading" 
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="absolute inset-0 bg-slate-50/80 backdrop-blur-sm z-20 flex flex-col items-center justify-center rounded-3xl" 
                style="display: none;"
            >
                <div class="bg-white p-6 rounded-3xl shadow-xl border border-slate-100 flex flex-col items-center gap-3 transform scale-100">
                    <div class="relative">
                        <!-- Outer Ring -->
                        <div class="w-12 h-12 rounded-full border-4 border-emerald-100 animate-pulse"></div>
                        <!-- Inner Spinning Circle -->
                        <div class="w-12 h-12 rounded-full border-4 border-emerald-600 border-t-transparent animate-spin absolute inset-0"></div>
                    </div>
                    <div class="text-center">
                        <span class="block text-xs font-extrabold text-slate-800">Memuat Katalog...</span>
                        <span class="text-[10px] text-slate-400 font-medium">Mitra Irigasi</span>
                    </div>
                </div>
            </div>

            <!-- List Produk Grid -->
            <div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @include('katalog.partials.product_list', ['products' => $products])
            </div>
        </div>

        <!-- CONTAINER PAGINATION -->
        <div id="pagination-container" class="mt-8 mb-16">
            @include('katalog.partials.pagination', ['products' => $products])
        </div>

        <!-- SECTION VIDEO TUTORIAL -->
        <div class="mt-16 pt-12 border-t border-slate-200">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block mb-1">
                    Panduan & Edukasi Teknik
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
                    Video Tutorial Pemasangan Peralatan Irigasi
                </h2>
                <p class="text-slate-500 text-xs sm:text-sm mt-2">
                    Pelajari cara perakitan, perawatan, dan skema pemasangan sistem irigasi tetes dan sprinkler untuk efisiensi lahan Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- VIDEO TUTORIAL 1 -->
                <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition group">
                    <div class="relative aspect-video bg-slate-800 cursor-pointer overflow-hidden flex flex-col items-center justify-center p-6 text-white" @click="playVideo('https://www.youtube.com/embed/vYuoECsqZy8')">
                        <div class="w-12 h-12 bg-emerald-600 text-white rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform mb-2">
                            <svg class="w-6 h-6 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-300 uppercase tracking-wider">Video Tutorial</span>
                    </div>
                    <div class="p-5 space-y-2">
                        <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider block">Tutorial 01</span>
                        <h3 class="font-bold text-slate-900 text-sm leading-snug">Panduan Pemasangan Selang Drip Line & Flat Dripper</h3>
                        <p class="text-slate-500 text-xs leading-relaxed">Cara menyambungkan selang drip ke pipa utama serta trik mengatur tekanan air agar merata.</p>
                    </div>
                </div>

                <!-- VIDEO TUTORIAL 2 -->
                <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition group">
                    <div class="relative aspect-video bg-slate-800 cursor-pointer overflow-hidden flex flex-col items-center justify-center p-6 text-white" @click="playVideo('https://www.youtube.com/embed/vYuoECsqZy8')">
                        <div class="w-12 h-12 bg-emerald-600 text-white rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform mb-2">
                            <svg class="w-6 h-6 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-300 uppercase tracking-wider">Video Tutorial</span>
                    </div>
                    <div class="p-5 space-y-2">
                        <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider block">Tutorial 02</span>
                        <h3 class="font-bold text-slate-900 text-sm leading-snug">Rancangan Nozzle Sprinkler untuk Kebun & Hortikultura</h3>
                        <p class="text-slate-500 text-xs leading-relaxed">Pilihan radius semprotan micro sprinkler dan cara pemeliharaan nozzle agar tidak tersumbat.</p>
                    </div>
                </div>

                <!-- VIDEO TUTORIAL 3 -->
                <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition group">
                    <div class="relative aspect-video bg-slate-800 cursor-pointer overflow-hidden flex flex-col items-center justify-center p-6 text-white" @click="playVideo('https://www.youtube.com/embed/vYuoECsqZy8')">
                        <div class="w-12 h-12 bg-emerald-600 text-white rounded-full flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform mb-2">
                            <svg class="w-6 h-6 fill-current ml-0.5" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-300 uppercase tracking-wider">Video Tutorial</span>
                    </div>
                    <div class="p-5 space-y-2">
                        <span class="text-[10px] font-bold text-emerald-600 uppercase tracking-wider block">Tutorial 03</span>
                        <h3 class="font-bold text-slate-900 text-sm leading-snug">Pembersihan Disc Filter & Pemasangan Solenoid Valve</h3>
                        <p class="text-slate-500 text-xs leading-relaxed">Cara melakukan backwash pada sistem filtrasi air agar pipa irigasi awet hingga bertahun-tahun.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- MODAL POPUP DETAIL PRODUK -->
    <div 
        x-show="modal.show" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-sm"
        style="display: none;"
    >
        <div @click.away="closeModal()" class="bg-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl relative overflow-hidden max-h-[90vh] overflow-y-auto border border-slate-100">
            <button @click="closeModal()" class="absolute top-5 right-5 text-slate-400 hover:text-slate-700 bg-slate-100 p-2 rounded-full transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 items-start">
                <div class="aspect-square bg-slate-100 rounded-2xl overflow-hidden border border-slate-200 flex items-center justify-center">
                    <template x-if="modal.product.photo">
                        <img :src="'/storage/' + modal.product.photo" :alt="modal.product.name" class="w-full h-full object-cover">
                    </template>
                    <template x-if="!modal.product.photo">
                        <div class="w-full h-full bg-slate-100 flex flex-col items-center justify-center p-6 text-slate-400">
                            <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-2 shadow-inner">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Foto Produk</span>
                        </div>
                    </template>
                </div>

                <div class="space-y-4">
                    <div>
                        <span class="bg-emerald-100 text-emerald-800 text-[10px] font-extrabold px-2.5 py-1 rounded-md uppercase tracking-wider" x-text="modal.categoryName"></span>
                        <h2 class="text-xl font-extrabold text-slate-900 mt-2 leading-snug" x-text="modal.product.name"></h2>
                    </div>

                    <div class="space-y-1">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wider block">Deskripsi Lengkap</span>
                        <p class="text-slate-600 text-xs leading-relaxed" x-text="modal.product.description"></p>
                    </div>

                    <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                        <div>
                            <span class="text-[10px] text-slate-400 block font-medium">Status Penawaran</span>
                            <span class="text-xs font-bold text-emerald-700">Nego via WhatsApp</span>
                        </div>

                        @auth
                            <div>
                                <template x-if="!cartItems[modal.product.id] || cartItems[modal.product.id] <= 0">
                                    <button 
                                        @click="addToCart(modal.product.id)" 
                                        class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs py-2.5 px-4 rounded-xl shadow-md shadow-emerald-200 transition flex items-center gap-2 cursor-pointer"
                                    >
                                        <span>+ Masukkan Keranjang</span>
                                    </button>
                                </template>
                                <template x-if="cartItems[modal.product.id] > 0">
                                    <div class="flex items-center bg-white border border-emerald-500 rounded-xl overflow-hidden shadow-sm">
                                        <button @click="updateQty(modal.product.id, 'decrement')" class="px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-black text-xs transition cursor-pointer">-</button>
                                        <span class="px-3 py-1 text-xs font-extrabold text-slate-800" x-text="cartItems[modal.product.id]"></span>
                                        <button @click="updateQty(modal.product.id, 'increment')" class="px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-black text-xs transition cursor-pointer">+</button>
                                    </div>
                                </template>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs py-2 px-3 rounded-xl transition">Login Dulu</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL POPUP PLAYER VIDEO TUTORIAL -->
    <div 
        x-show="videoModal.show" 
        x-transition
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/80 backdrop-blur-md"
        style="display: none;"
    >
        <div @click.away="closeVideo()" class="bg-black rounded-3xl max-w-3xl w-full overflow-hidden shadow-2xl relative">
            <button @click="closeVideo()" class="absolute top-3 right-3 text-white bg-slate-800/80 hover:bg-slate-700 p-2 rounded-full z-10 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
            <div class="aspect-video w-full">
                <iframe :src="videoModal.url" class="w-full h-full" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

</div>

<script>
    function katalogData(initialCart) {
        return {
            search: '{{ request("search") }}',
            currentCategory: '{{ request("category", "all") }}',
            loading: false,
            cartItems: initialCart || {},
            toast: { show: false, message: '' },
            modal: { show: false, product: {}, categoryName: '' },
            videoModal: { show: false, url: '' },

            filterCategory(slug) {
                this.currentCategory = slug;
                const url = `/katalog?category=${slug}&search=${encodeURIComponent(this.search)}`;
                this.fetchProducts(url);
            },

            async fetchProducts(url) {
                this.loading = true;
                try {
                    const res = await fetch(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    });
                    const data = await res.json();
                    
                    // Update DOM secara langsung tanpa reload halaman
                    document.getElementById('product-grid').innerHTML = data.html;
                    document.getElementById('pagination-container').innerHTML = data.pagination;

                    // Update URL browser tanpa memicu reload
                    window.history.pushState({}, '', url);
                } catch (e) {
                    console.error('Error fetching products:', e);
                } finally {
                    this.loading = false;
                }
            },

            showToast(msg) {
                this.toast.message = msg;
                this.toast.show = true;
                setTimeout(() => { this.toast.show = false; }, 2500);
            },

            openModal(product, categoryName) {
                this.modal.product = product;
                this.modal.categoryName = categoryName;
                this.modal.show = true;
            },

            closeModal() {
                this.modal.show = false;
            },

            playVideo(url) {
                this.videoModal.url = url;
                this.videoModal.show = true;
            },

            closeVideo() {
                this.videoModal.show = false;
                this.videoModal.url = '';
            },

            async addToCart(productId) {
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                try {
                    const res = await fetch(`/cart/add/${productId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json'
                        }
                    });
                    const data = await res.json();
                    if (data.status === 'success') {
                        this.cartItems[productId] = data.quantity;
                        this.showToast('Produk ditambahkan ke keranjang!');
                        window.dispatchEvent(new CustomEvent('cart-updated', { detail: { count: data.cart_count } }));
                    }
                } catch (e) {
                    console.error('Error adding product:', e);
                }
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
                        this.cartItems[productId] = data.quantity;
                        if (data.quantity === 0) delete this.cartItems[productId];
                        window.dispatchEvent(new CustomEvent('cart-updated', { detail: { count: data.cart_count } }));
                    }
                } catch (e) {
                    console.error('Error updating quantity:', e);
                }
            }
        };
    }
</script>
@endsection