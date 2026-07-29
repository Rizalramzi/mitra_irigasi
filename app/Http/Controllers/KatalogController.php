<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index(Request $request)
    {
        // 1. Ambil kategori untuk filter
        $categories = Category::withCount('products')->get();

        // 2. Query dasar produk
        $productsQuery = Product::with('category', 'vendor');

        // Filter pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $productsQuery->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('code', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan SLUG KATEGORI
        if ($request->filled('category') && $request->category !== 'all') {
            $categorySlug = $request->category;
            $productsQuery->whereHas('category', function ($q) use ($categorySlug) {
                $q->where('slug', $categorySlug)
                  ->orWhere('name', $categorySlug);
            });
        }

        // 3. Pagination 12 produk per halaman
        $products = $productsQuery->latest()->paginate(12)->withQueryString();

        // Jika request via AJAX / Fetch, kembalikan respon JSON agar cepat
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'html' => view('katalog.partials.product_list', compact('products'))->render(),
                'pagination' => view('katalog.partials.pagination', compact('products'))->render(),
            ]);
        }

        return view('katalog', compact('categories', 'products'));
    }
}