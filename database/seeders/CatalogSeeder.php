<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Data Kategori & Produk Irigasi
        $categoriesData = [
            [
                'name' => 'Sistem Drip Irigasi (Tetes)',
                'products' => [
                    [
                        'name' => 'Dripper Emitter Adjustabel 0-70 L/H',
                        'description' => 'Penetes air irigasi yang dapat diatur debit airnya. Cocok untuk tanaman pot, greenhouse, dan perkebunan hortikultura.',
                        'function' => 'Mengatur debit tetesan air langsung ke perakaran tanaman.',
                    ],
                    [
                        'name' => 'Selang PE 16mm (Polyethylene)',
                        'description' => 'Selang utama distribusi irigasi tetes tahan sinar UV, lentur, dan tahan tekanan sedang.',
                        'function' => 'Pipa jalur utama penyalur air irigasi.',
                    ],
                    [
                        'name' => 'Pita Drip Tape Pipe 16mm (Jarak 20cm)',
                        'description' => 'Selang drip pipih khusus tanaman barisan seperti cabai, tomat, dan bawang.',
                        'function' => 'Menyebar air secara presisi di sepanjang barisan tanaman.',
                    ],
                ],
            ],
            [
                'name' => 'Sprinkler & Micro Sprayer',
                'products' => [
                    [
                        'name' => 'Impact Sprinkler Plastik 1/2 Inch',
                        'description' => 'Sprinkler putar dengan jangkauan siram 8 - 12 meter. Material plastik enginering tahan cuaca.',
                        'function' => 'Penyiraman area luas seperti lapangan rumput dan tanaman pangan.',
                    ],
                    [
                        'name' => 'Micro Sprayer Fogging Nozzle 4 Arah',
                        'description' => 'Pengabut mikro untuk menurunkan suhu dan menjaga kelembaban udara.',
                        'function' => 'Pengabutan halus untuk greenhouse dan budidaya jamur.',
                    ],
                    [
                        'name' => 'Pop-Up Sprinkler 4 Inch',
                        'description' => 'Sprinkler tersembunyi yang akan naik saat ada tekanan air dan turun kembali saat mati.',
                        'function' => 'Penyiraman otomatis untuk taman kota dan lapangan golf.',
                    ],
                ],
            ],
            [
                'name' => 'Filtrasi & Otomasi Irigasi',
                'products' => [
                    [
                        'name' => 'Disc Filter Irigasi 2 Inch (120 Mesh)',
                        'description' => 'Saringan penyaring kotoran dan lumpur agar nozzle dripper/sprinkler tidak tersumbat.',
                        'function' => 'Menyaring partikel fisik pada sumber air irigasi.',
                    ],
                    [
                        'name' => 'Solenoid Valve 1 Inch AC 220V / DC 12V',
                        'description' => 'Kran listrik otomatis yang dikontrol oleh pengatur waktu (timer/PLC).',
                        'function' => 'Membuka dan menutup aliran air irigasi secara otomatis.',
                    ],
                    [
                        'name' => 'Injektor Venturi Fertigasi 3/4 Inch',
                        'description' => 'Alat penyedot pupuk cair memanfaatkan tekanan aliran air (sistem fertigasi).',
                        'function' => 'Pencampuran pupuk cair langsung ke dalam sistem irigasi.',
                    ],
                ],
            ],
        ];

        // 2. Loop & Simpan ke Database
        foreach ($categoriesData as $catData) {
            $category = Category::create([
                'name' => $catData['name'],
                'slug' => Str::slug($catData['name']),
            ]);

            foreach ($catData['products'] as $prodData) {
                Product::create([
                    'category_id' => $category->id,
                    'name'        => $prodData['name'],
                    'slug'        => Str::slug($prodData['name']),
                    'description' => $prodData['description'],
                    'function'    => $prodData['function'],
                    'photo'       => null,
                ]);
            }
        }
    }
}