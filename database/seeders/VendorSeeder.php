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
        $vendorNames = [
            'ChinaDrip',
            'Fuzhou ARTHAS Fluid Equip.Tech',
            'HYRT Irrigation',
            'Ningbo Shangda Plastic Hardware',
            'Yuyao Zanchen Auto.Contrl',
        ];

        foreach ($vendorNames as $vendorName) {
            Vendor::firstOrCreate([
                'name' => $vendorName,
            ]);
        }
    }
}