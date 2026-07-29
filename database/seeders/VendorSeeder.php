<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendors = [
            'Yuyao Zanchen Auto Contrl',
            'ChinaDrip',
            'Fuzhou ARTHAS Fluid Equip Tech',
            'Ningbo Shangda Plastic Hardware',
            'HYRT Irrigation',
        ];

        foreach ($vendors as $vendorName) {
            Vendor::firstOrCreate([
                'name' => $vendorName,
            ]);
        }
    }
}