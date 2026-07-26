@extends('layouts.app')

@section('title', 'Mitra Irigasi - Solusi Peralatan Irigasi Pertanian')

@section('content')

<!-- 1. HERO SECTION -->
<div class="bg-linear-to-b from-emerald-50 via-white to-slate-50 py-12 lg:py-20 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 bg-emerald-100 text-emerald-800 text-xs sm:text-sm font-bold px-3.5 py-1.5 rounded-full border border-emerald-300">
                    <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <span>Mitra Resmi CV. Wijaya Karya</span>
                </div>

                <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    Pengairan Lebih Mudah, <br class="hidden sm:inline">
                    <span class="text-emerald-600">Hasil Panen Lebih Melimpah</span>
                </h1>

                <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-2xl mx-auto lg:mx-0">
                    Sediakan perlengkapan irigasi tetes, sprinkler, dan komponen penyiraman berkualitas untuk kebun dan sawah Anda. Hemat air, hemat tenaga, harga bersahabat.
                </p>

                <!-- CALL TO ACTION BUTTONS -->
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start pt-2">
                    <a href="{{ route('katalog') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-base px-8 py-4 rounded-xl shadow-lg shadow-emerald-200 transition text-center flex items-center justify-center gap-2">
                        <span>Pilih Peralatan Sekarang</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>

                    @auth
                        <a href="{{ route('chatbot') }}" class="bg-white hover:bg-slate-100 text-slate-700 font-bold text-base px-6 py-4 rounded-xl border-2 border-slate-200 transition text-center flex items-center justify-center gap-2">
                            <span>Konsultasi AI</span>
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="bg-white hover:bg-slate-100 text-slate-700 font-bold text-base px-6 py-4 rounded-xl border-2 border-slate-200 transition text-center">
                            Daftar Akun Baru
                        </a>
                    @endauth
                </div>

                <!-- STATISTIK RINGKAS -->
                <div class="grid grid-cols-3 gap-4 pt-6 border-t border-slate-200 text-center lg:text-left">
                    <div>
                        <span class="block text-2xl font-black text-slate-900">100%</span>
                        <span class="text-xs text-slate-500 font-medium">Barang Original</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-black text-slate-900">Direct WA</span>
                        <span class="text-xs text-slate-500 font-medium">Respon Cepat</span>
                    </div>
                    <div>
                        <span class="block text-2xl font-black text-slate-900">Teknis</span>
                        <span class="text-xs text-slate-500 font-medium">Siap Dampingi</span>
                    </div>
                </div>
            </div>

            <!-- CARD ALUR PEMESANAN -->
            <div class="lg:col-span-5">
                <div class="bg-white rounded-2xl p-6 shadow-xl border border-slate-100 space-y-4 relative">
                    <div class="bg-emerald-600 text-white p-4 rounded-xl flex items-center gap-3">
                        <div class="w-10 h-10 bg-emerald-500 rounded-lg flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-sm">Pemesanan Mudah via WA</h4>
                            <p class="text-xs text-emerald-100">Bisa negosiasi penawaran harga resmi</p>
                        </div>
                    </div>

                    <div class="space-y-3 pt-2">
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-lg border border-slate-100">
                            <span class="w-7 h-7 bg-emerald-100 text-emerald-800 rounded-full font-bold text-xs flex items-center justify-center shrink-0">1</span>
                            <span class="text-xs font-semibold text-slate-700">Pilih alat irigasi dari katalog</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-lg border border-slate-100">
                            <span class="w-7 h-7 bg-emerald-100 text-emerald-800 rounded-full font-bold text-xs flex items-center justify-center shrink-0">2</span>
                            <span class="text-xs font-semibold text-slate-700">Masukkan barang ke keranjang</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-lg border border-slate-100">
                            <span class="w-7 h-7 bg-emerald-100 text-emerald-800 rounded-full font-bold text-xs flex items-center justify-center shrink-0">3</span>
                            <span class="text-xs font-semibold text-slate-700">Kirim draf pesanan ke WA Admin</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- 2. SECTION MASALAH & SOLUSI (KENAPA HARUS IRIGASI MODERN) -->
<div class="py-16 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Solusi Tepat Memangkas Biaya & Tenaga Lahan</h2>
            <p class="text-slate-500 text-sm sm:text-base mt-2">Penyiraman manual memakan banyak waktu dan biaya buruh. Sistem irigasi presisi membantu lahan Anda tetap subur secara konsisten.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-700 rounded-xl flex items-center justify-center font-bold text-xl mb-4">💧</div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Hemat Air Hingga 50%</h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">Air dialirkan langsung ke zona perakaran tanpa banyak menguap atau terbuang sia-sia di parit.</p>
            </div>

            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200">
                <div class="w-12 h-12 bg-blue-100 text-blue-700 rounded-xl flex items-center justify-center font-bold text-xl mb-4">⏱️</div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Hemat Tenaga Kerja</h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">Cukup putar kran atau gunakan timer otomatis, puluhan hingga ratusan tanaman tersiram sekaligus.</p>
            </div>

            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-200">
                <div class="w-12 h-12 bg-amber-100 text-amber-700 rounded-xl flex items-center justify-center font-bold text-xl mb-4">🌱</div>
                <h3 class="font-bold text-slate-900 text-lg mb-2">Pertumbuhan Merata</h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed">Setiap bibit mendapat takaran air dan nutrisi pupuk yang seimbang, meminimalisir tanaman kerdil.</p>
            </div>
        </div>
    </div>
</div>


<!-- 3. KATEGORI PERALATAN UTAMA -->
<div class="py-16 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Kategori Peralatan Irigasi</h2>
            <p class="text-sm sm:text-base text-slate-500 mt-2">Didesain khusus untuk menangani berbagai kondisi lahan dan jenis tanaman Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center mb-4 font-black">💧</div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Sistem Irigasi Tetes</h3>
                <p class="text-xs sm:text-sm text-slate-500 leading-relaxed mb-4">Sangat hemat air dan cocok untuk tanaman hortikultura seperti cabai, tomat, melon, dan bawang merah.</p>
                <a href="{{ route('katalog') }}" class="text-xs font-bold text-emerald-600 hover:underline inline-flex items-center gap-1">
                    Lihat Produk Katalog →
                </a>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-emerald-100 text-emerald-600 rounded-xl flex items-center justify-center mb-4 font-black">🌧️</div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Sprinkler & Penyiram Putar</h3>
                <p class="text-xs sm:text-sm text-slate-500 leading-relaxed mb-4">Menyiram dengan jangkauan luas secara merata seperti hujan alami. Bagus untuk lahan sayur barisan dan rumput.</p>
                <a href="{{ route('katalog') }}" class="text-xs font-bold text-emerald-600 hover:underline inline-flex items-center gap-1">
                    Lihat Produk Katalog →
                </a>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-amber-100 text-amber-600 rounded-xl flex items-center justify-center mb-4 font-black">⚙️</div>
                <h3 class="text-lg font-bold text-slate-900 mb-2">Filtrasi & Fertigasi</h3>
                <p class="text-xs sm:text-sm text-slate-500 leading-relaxed mb-4">Penyaring lumpur agar kran/penetes tidak tersumbat, serta injektor pupuk cair otomatis langsung ke saluran pipa.</p>
                <a href="{{ route('katalog') }}" class="text-xs font-bold text-emerald-600 hover:underline inline-flex items-center gap-1">
                    Lihat Produk Katalog →
                </a>
            </div>
        </div>
    </div>
</div>


<!-- 4. KEUNGGULAN MITRA IRIGASI (VALUE PROPOSITION) -->
<div class="py-16 bg-white border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest block mb-2">Kenapa Memilih Kami</span>
                <h2 class="text-2xl sm:text-4xl font-extrabold text-slate-900 leading-tight mb-6">Komitmen CV. Wijaya Karya untuk Pertanian Indonesia</h2>
                
                <div class="space-y-4">
                    <div class="flex gap-4 items-start">
                        <div class="w-8 h-8 bg-emerald-100 text-emerald-700 rounded-lg flex items-center justify-center font-bold text-sm shrink-0 mt-1">✓</div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-base">Material Tahan Cuaca Ekstrem</h4>
                            <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Komponen selang dan plastik enginering kami tahan paparan panas matahari (UV) dan bahan kimia pupuk.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start">
                        <div class="w-8 h-8 bg-emerald-100 text-emerald-700 rounded-lg flex items-center justify-center font-bold text-sm shrink-0 mt-1">✓</div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-base">Penawaran Transparan via WhatsApp</h4>
                            <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Tidak perlu takut tertipu. Anda bisa berkonsultasi mengenai spesifikasi barang sebelum menyetujui transaksi.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start">
                        <div class="w-8 h-8 bg-emerald-100 text-emerald-700 rounded-lg flex items-center justify-center font-bold text-sm shrink-0 mt-1">✓</div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-base">Dukungan Asisten AI Konsultasi</h4>
                            <p class="text-slate-500 text-xs sm:text-sm mt-0.5">Gunakan layanan Chatbot AI kami untuk menanyakan jenis irigasi yang cocok berdasarkan luas lahan Anda.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-emerald-900 text-emerald-50 rounded-3xl p-8 sm:p-10 shadow-2xl relative overflow-hidden">
                <div class="relative z-10 space-y-6">
                    <h3 class="text-2xl font-bold">Butuh Bantuan Menghitung Kebutuhan Lahan?</h3>
                    <p class="text-emerald-200 text-xs sm:text-sm leading-relaxed">
                        Tim teknis Mitra Irigasi siap membantu Anda merancang tata letak selang, pompa, dan jumlah nozzle yang pas agar efisien.
                    </p>
                    <a href="https://wa.me/6282142010020?text=Halo%20Admin%20Mitra%20Irigasi,%20saya%20mau%20konsultasi%20kebutuhan%20lahan" target="_blank" class="inline-block bg-emerald-500 hover:bg-emerald-400 text-slate-900 font-extrabold text-sm px-6 py-3.5 rounded-xl transition shadow-md">
                        Hubungi Admin Direct WA →
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- 5. TESTIMONI MIKRO / SOCIAL PROOF -->
<div class="py-16 bg-slate-50 border-b border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Dipercaya Oleh Petani & Pengelola Kebun</h2>
            <p class="text-sm text-slate-500 mt-2">Pengalaman mereka yang telah mengotomatisasi sistem pengairan lahan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                <p class="text-slate-700 text-xs sm:text-sm italic">"Pakai selang PE dan drip emitter dari Mitra Irigasi buat kebun cabai 0.5 hektar. Penyiraman yang dulunya butuh seharian sekarang cuma 1 jam buka kran."</p>
                <div class="pt-2 border-t border-slate-100 text-xs">
                    <strong class="text-slate-900 block">Pak Budi Santoso</strong>
                    <span class="text-slate-400">Petani Cabai - Malang, Jawa Timur</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-3">
                <div class="flex text-amber-400 gap-1 text-sm">★★★★★</div>
                <p class="text-slate-700 text-xs sm:text-sm italic">"Pesan via WhatsApp responnya sangat cepat. Barang dikirim lengkap dan kualitas impact sprinkler-nya kokoh tidak gampang pecah kena jemur."</p>
                <div class="pt-2 border-t border-slate-100 text-xs">
                    <strong class="text-slate-900 block">Ibu Siti Aminah</strong>
                    <span class="text-slate-400">Pengelola Greenhouse Hortikultura - Batu</span>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- 6. SECTION PERTANYAAN UMUM (FAQ) -->
<div class="py-16 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Pertanyaan Yang Sering Diajukan</h2>
            <p class="text-xs sm:text-sm text-slate-500 mt-2">Informasi seputar cara transaksi dan pengiriman peralatan.</p>
        </div>

        <div class="space-y-4" x-data="{ active: null }">
            <div class="border border-slate-200 rounded-xl overflow-hidden">
                <button @click="active = (active === 1 ? null : 1)" class="w-full text-left p-4 font-bold text-slate-800 text-sm sm:text-base flex justify-between items-center bg-slate-50 hover:bg-slate-100 transition">
                    <span>Bagaimana cara melakukan pemesanan barang?</span>
                    <span x-text="active === 1 ? '−' : '+'" class="text-lg font-bold text-emerald-600"></span>
                </button>
                <div x-show="active === 1" class="p-4 text-xs sm:text-sm text-slate-600 border-t border-slate-200 bg-white">
                    Pilih produk dari halaman Katalog, masukkan ke Keranjang Belanja, lalu klik tombol Checkout WA. Draf pesanan Anda akan otomatis terkirim ke WhatsApp Admin untuk konfirmasi ketersediaan dan harga final.
                </div>
            </div>

            <div class="border border-slate-200 rounded-xl overflow-hidden">
                <button @click="active = (active === 2 ? null : 2)" class="w-full text-left p-4 font-bold text-slate-800 text-sm sm:text-base flex justify-between items-center bg-slate-50 hover:bg-slate-100 transition">
                    <span>Apakah harga peralatan bisa dinegosiasikan?</span>
                    <span x-text="active === 2 ? '−' : '+'" class="text-lg font-bold text-emerald-600"></span>
                </button>
                <div x-show="active === 2" class="p-4 text-xs sm:text-sm text-slate-600 border-t border-slate-200 bg-white">
                    Ya, untuk pembelian jumlah banyak (grosir) atau proyek pengairan lahan luas, Admin CV. Wijaya Karya akan memberikan harga penawaran khusus (*deal price*).
                </div>
            </div>

            <div class="border border-slate-200 rounded-xl overflow-hidden">
                <button @click="active = (active === 3 ? null : 3)" class="w-full text-left p-4 font-bold text-slate-800 text-sm sm:text-base flex justify-between items-center bg-slate-50 hover:bg-slate-100 transition">
                    <span>Apakah menerima pengiriman ke luar daerah?</span>
                    <span x-text="active === 3 ? '−' : '+'" class="text-lg font-bold text-emerald-600"></span>
                </button>
                <div x-show="active === 3" class="p-4 text-xs sm:text-sm text-slate-600 border-t border-slate-200 bg-white">
                    Tentu saja! Kami siap mengirimkan paket perlengkapan irigasi ke seluruh wilayah Indonesia melalui ekspedisi cargo terpercaya.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection