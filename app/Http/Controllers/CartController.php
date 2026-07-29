<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Tampilkan Halaman Keranjang Belanja
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();

        // Format ulang struktur agar tetap kompatibel dengan view keranjang yang sudah dibuat
        $cart = [];
        foreach ($cartItems as $item) {
            if ($item->product) {
                $cart[$item->product_id] = [
                    'id'       => $item->product_id,
                    'name'     => $item->product->name,
                    'description' => $item->product->description,
                    'photo'    => $item->product->photo,
                    'quantity' => $item->quantity,
                ];
            }
        }

        return view('cart.index', compact('cart'));
    }

    // Tambah / Update Produk via AJAX tanpa reload
    public function add(Request $request, Product $product)
    {
        $userId = Auth::id();

        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $cartItem = Cart::create([
                'user_id'    => $userId,
                'product_id' => $product->id,
                'quantity'   => 1,
            ]);
        }

        // Ambil total item unik di keranjang user
        $totalCartCount = Cart::where('user_id', $userId)->count();

        // Jika request berupa AJAX / JSON
        if ($request->wantsJson()) {
            return response()->json([
                'status'     => 'success',
                'message'    => 'Produk berhasil ditambahkan!',
                'quantity'   => $cartItem->quantity,
                'cart_count' => $totalCartCount,
            ]);
        }

        return back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    // Update Quantity Langsung (Tambah / Kurang) via AJAX
    public function update(Request $request, Product $product)
    {
        $userId = Auth::id();
        $action = $request->input('action'); // 'increment', 'decrement', atau set manual quantity

        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            if ($action === 'decrement') {
                if ($cartItem->quantity > 1) {
                    $cartItem->decrement('quantity');
                } else {
                    $cartItem->delete();
                    $cartItem->quantity = 0;
                }
            } elseif ($action === 'increment') {
                $cartItem->increment('quantity');
            } else {
                $quantity = max(1, (int) $request->input('quantity', 1));
                $cartItem->update(['quantity' => $quantity]);
            }
        }

        $totalCartCount = Cart::where('user_id', $userId)->count();

        if ($request->wantsJson()) {
            return response()->json([
                'status'     => 'success',
                'quantity'   => $cartItem ? $cartItem->quantity : 0,
                'cart_count' => $totalCartCount,
            ]);
        }

        return back()->with('success', 'Jumlah produk diperbarui!');
    }

    // Hapus Produk dari Keranjang
    public function remove(Product $product)
    {
        Cart::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->delete();

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }
}