<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID Kategori & Vendor agar lebih mudah direferensikan
        $categories = Category::pluck('id', 'name');
        $vendors = Vendor::pluck('id', 'name');

        $productsData = [
            // Drip Irrigation
            [
                'category_name' => 'Drip Irrigation',
                'vendor_name'   => 'ChinaDrip',
                'code'          => 'DRP-ADJ-01',
                'name'          => 'Dripper Emitter Adjustabel 0-70 L/H',
                'description'   => 'Penetes air irigasi yang dapat diatur debit airnya. Cocok untuk tanaman pot, greenhouse, dan perkebunan hortikultura.',
            ],
            [
                'category_name' => 'Drip Irrigation',
                'vendor_name'   => 'HYRT Irrigation',
                'code'          => 'DRP-TAP-16',
                'name'          => 'Pita Drip Tape Pipe 16mm (Jarak 20cm)',
                'description'   => 'Selang drip pipih khusus tanaman barisan seperti cabai, tomat, dan bawang.',
            ],

            // Hose/Tube
            [
                'category_name' => 'Hose/Tube',
                'vendor_name'   => 'HYRT Irrigation',
                'code'          => 'TUB-PE-16',
                'name'          => 'Selang PE 16mm (Polyethylene)',
                'description'   => 'Selang utama distribusi irigasi tetes tahan sinar UV, lentur, dan tahan tekanan sedang.',
            ],

            // Sprinkler
            [
                'category_name' => 'Sprinkler',
                'vendor_name'   => 'Ningbo Shangda Plastic Hardware',
                'code'          => 'SPR-IMP-01',
                'name'          => 'Impact Sprinkler Plastik 1/2 Inch',
                'description'   => 'Sprinkler putar dengan jangkauan siram 8 - 12 meter. Material plastik engineering tahan cuaca.',
            ],
            [
                'category_name' => 'Sprinkler',
                'vendor_name'   => 'Ningbo Shangda Plastic Hardware',
                'code'          => 'SPR-FOG-04',
                'name'          => 'Micro Sprayer Fogging Nozzle 4 Arah',
                'description'   => 'Pengabut mikro untuk menurunkan suhu dan menjaga kelembaban udara.',
            ],
            [
                'category_name' => 'Sprinkler',
                'vendor_name'   => 'Yuyao Zanchen Auto Contrl',
                'code'          => 'SPR-POP-04',
                'name'          => 'Pop-Up Sprinkler 4 Inch',
                'description'   => 'Sprinkler tersembunyi yang akan naik saat ada tekanan air dan turun kembali saat mati.',
            ],

            // Filter
            [
                'category_name' => 'Filter',
                'vendor_name'   => 'Fuzhou ARTHAS Fluid Equip Tech',
                'code'          => 'FLT-DSC-02',
                'name'          => 'Disc Filter Irigasi 2 Inch (120 Mesh)',
                'description'   => 'Saringan penyaring kotoran dan lumpur agar nozzle dripper/sprinkler tidak tersumbat.',
            ],

            // Valve
            [
                'category_name' => 'Valve',
                'vendor_name'   => 'Yuyao Zanchen Auto Contrl',
                'code'          => 'VLV-SOL-220',
                'name'          => 'Solenoid Valve 1 Inch AC 220V / DC 12V',
                'description'   => 'Kran listrik otomatis yang dikontrol oleh pengatur waktu (timer/PLC).',
            ],

            // Connector
            [
                'category_name' => 'Connector',
                'vendor_name'   => 'ChinaDrip',
                'code'          => 'CNT-VNT-03',
                'name'          => 'Injektor Venturi Fertigasi 3/4 Inch',
                'description'   => 'Alat penyedot pupuk cair memanfaatkan tekanan aliran air (sistem fertigasi).',
            ],
        ];

        foreach ($productsData as $prod) {
            Product::create([
                'category_id' => $categories[$prod['category_name']] ?? null,
                'vendor_id'   => $vendors[$prod['vendor_name']] ?? null,
                'code'        => $prod['code'],
                'name'        => $prod['name'],
                'slug'        => Str::slug($prod['name'] . '-' . $prod['code']),
                'description' => $prod['description'],
                'photo'       => null,
            ]);
        }
    }
}