@if ($products->hasPages())
    <div class="bg-white p-4 sm:p-5 rounded-3xl border border-slate-200 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
        <div class="text-xs text-slate-500 font-medium text-center sm:text-left">
            Menampilkan <span class="font-extrabold text-slate-800">{{ $products->firstItem() ?? 0 }}</span> 
            sampai <span class="font-extrabold text-slate-800">{{ $products->lastItem() ?? 0 }}</span> 
            dari <span class="font-extrabold text-emerald-600">{{ $products->total() }}</span> total produk
        </div>

        <div class="flex items-center gap-1.5 flex-wrap justify-center">
            {{-- Prev --}}
            @if ($products->onFirstPage())
                <span class="px-3.5 py-2 rounded-xl bg-slate-100 text-slate-400 text-xs font-bold cursor-not-allowed select-none">&laquo; Prev</span>
            @else
                <button @click="fetchProducts('{{ $products->previousPageUrl() }}')" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-emerald-50 text-slate-700 hover:text-emerald-700 text-xs font-bold transition">&laquo; Prev</button>
            @endif

            {{-- Numbers --}}
            @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                @if ($page == $products->currentPage())
                    <span class="px-3.5 py-2 rounded-xl bg-emerald-600 text-white text-xs font-extrabold shadow-sm shadow-emerald-200">{{ $page }}</span>
                @else
                    <button @click="fetchProducts('{{ $url }}')" class="px-3.5 py-2 rounded-xl bg-slate-50 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">{{ $page }}</button>
                @endif
            @endforeach

            {{-- Next --}}
            @if ($products->hasMorePages())
                <button @click="fetchProducts('{{ $products->nextPageUrl() }}')" class="px-3.5 py-2 rounded-xl bg-slate-100 hover:bg-emerald-50 text-slate-700 hover:text-emerald-700 text-xs font-bold transition">Next &raquo;</button>
            @else
                <span class="px-3.5 py-2 rounded-xl bg-slate-100 text-slate-400 text-xs font-bold cursor-not-allowed select-none">Next &raquo;</span>
            @endif
        </div>
    </div>
@endif