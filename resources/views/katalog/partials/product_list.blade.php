@forelse($products as $product)
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between overflow-hidden group">
        <div>
            <!-- FOTO PRODUK RASIO 1:1 -->
            <div 
                @click="openModal({{ json_encode($product) }}, '{{ $product->category->name ?? 'Irigasi' }}')" 
                class="relative aspect-square bg-slate-100 overflow-hidden cursor-pointer flex items-center justify-center border-b border-slate-100"
            >
                @if($product->photo)
                    <img 
                        src="{{ asset('storage/' . $product->photo) }}" 
                        alt="{{ $product->name }}" 
                        loading="lazy"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                    >
                @else
                    <div class="w-full h-full bg-slate-100 flex flex-col items-center justify-center p-6 text-slate-400 group-hover:bg-slate-200/60 transition duration-300">
                        <div class="w-16 h-16 bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center mb-2 shadow-inner">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <span class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Foto Produk</span>
                        <span class="text-[10px] text-slate-400">Mitra Irigasi</span>
                    </div>
                @endif

                <div class="absolute top-3 left-3 flex flex-col gap-1.5 items-start">
                    <span class="bg-emerald-600/90 backdrop-blur-md text-white text-[10px] font-extrabold px-2.5 py-1 rounded-lg uppercase tracking-wider shadow-sm">
                        {{ $product->category->name ?? 'Umum' }}
                    </span>
                </div>

                <div class="absolute bottom-3 right-3">
                    <span class="bg-white/90 backdrop-blur-md text-slate-700 text-[11px] font-bold px-3 py-1.5 rounded-xl shadow-sm flex items-center gap-1 group-hover:bg-emerald-600 group-hover:text-white transition">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Detail
                    </span>
                </div>
            </div>

            <!-- KONTEN -->
            <div class="p-5">
                <h3 
                    @click="openModal({{ json_encode($product) }}, '{{ $product->category->name ?? 'Irigasi' }}')" 
                    class="font-extrabold text-slate-900 text-base mb-2 group-hover:text-emerald-600 transition cursor-pointer leading-snug line-clamp-1"
                >
                    {{ $product->name }}
                </h3>
                <p class="text-slate-500 text-xs line-clamp-2 leading-relaxed">
                    {{ $product->description }}
                </p>
            </div>
        </div>

        <!-- FOOTER CARD ACTION -->
        <div class="px-5 py-3.5 bg-slate-50 border-t border-slate-100 flex items-center justify-between min-h-15">
            <div>
                <span class="block text-[10px] text-slate-400 font-medium">Penawaran Harga</span>
                <span class="text-xs font-bold text-emerald-700">Nego via WA</span>
            </div>

            @auth
                <div>
                    <template x-if="!cartItems[{{ $product->id }}] || cartItems[{{ $product->id }}] <= 0">
                        <button 
                            @click="addToCart({{ $product->id }})" 
                            class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs py-2 px-3.5 rounded-xl shadow-sm shadow-emerald-200 transition flex items-center gap-1.5 cursor-pointer"
                        >
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span>Keranjang</span>
                        </button>
                    </template>
                    <template x-if="cartItems[{{ $product->id }}] > 0">
                        <div class="flex items-center bg-white border border-emerald-500 rounded-xl overflow-hidden shadow-sm">
                            <button @click="updateQty({{ $product->id }}, 'decrement')" class="px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-black text-xs transition cursor-pointer">-</button>
                            <span class="px-3 py-1 text-xs font-extrabold text-slate-800" x-text="cartItems[{{ $product->id }}]"></span>
                            <button @click="updateQty({{ $product->id }}, 'increment')" class="px-3 py-1.5 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 font-black text-xs transition cursor-pointer">+</button>
                        </div>
                    </template>
                </div>
            @else
                <a href="{{ route('login') }}" class="bg-slate-200 hover:bg-slate-300 text-slate-700 font-bold text-xs py-2 px-3 rounded-xl transition">Login Dulu</a>
            @endauth
        </div>
    </div>
@empty
    <div class="col-span-full bg-white p-12 rounded-3xl border border-slate-200 text-center">
        <p class="text-slate-500 font-medium text-sm">Belum ada data produk katalog yang sesuai.</p>
    </div>
@endforelse