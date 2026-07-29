<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryNames = [
            'Connector',
            'Controller',
            'Dripline',
            'Dripper',
            'Fertilizer Injector',
            'Filter',
            'Sprinkler',
            'Valve',
        ];

        foreach ($categoryNames as $catName) {
            Category::firstOrCreate(
                ['slug' => Str::slug($catName)],
                ['name' => $catName]
            );
        }
    }
}