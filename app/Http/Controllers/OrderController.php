<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkoutWhatsApp(Request $request)
    {
        $user = Auth::user();

        // 1. Ambil item keranjang dari DATABASE beserta relasi Produk & Vendor
        $cartItems = Cart::with('product.vendor')->where('user_id', $user->id)->get();

        // Jika keranjang di database kosong, kembalikan ke katalog
        if ($cartItems->isEmpty()) {
            return redirect()->route('katalog')->with('error', 'Keranjang belanja Anda masih kosong.');
        }

        // 2. Simpan Draf Order ke Database
        $order = Order::create([
            'order_number'    => 'ORD-' . strtoupper(uniqid()),
            'user_id'         => $user->id,
            'visitor_name'    => $user->name,
            'visitor_phone'   => $user->phone_number,
            'visitor_email'   => $user->email,
            'visitor_address' => $user->address,
            'visitor_purpose' => $user->visitor_purpose,
            'status'          => 'pending',
        ]);

        $itemsText = "";
        $i = 1;

        foreach ($cartItems as $item) {
            if ($item->product) {
                // Simpan item pesanan ke database
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                ]);

                // Ambil kode produk jika ada
                $code = !empty($item->product->code) ? " [{$item->product->code}]" : "";
                
                // Ambil nama vendor jika ada
                // $vendor = ($item->product->vendor) ? " (Supplier: {$item->product->vendor->name})" : "";

                // Susun baris teks produk
                $itemsText .= "{$i}. *{$item->product->name}*{$code}\n   • Jumlah: {$item->quantity} pcs\n";
                $i++;
            }
        }

        // 3. Kosongkan Keranjang di DATABASE setelah checkout
        Cart::where('user_id', $user->id)->delete();

        // 4. Format Pesan dan Redirect ke WA Admin
        $adminPhone = '6282142010020';
        
        $message = "Halo Mitra Irigasi,\n\n"
            . "Saya mau mengajukan pemesanan/penawaran produk berikut:\n"
            . "• *Nomor Pesanan:* {$order->order_number}\n"
            . "• *Nama Pemohon:* {$order->visitor_name}\n"
            . "• *No. WhatsApp:* {$order->visitor_phone}\n"
            . "• *Tujuan Pengadaan:* {$order->visitor_purpose}\n\n"
            . "*Daftar Produk yang Dipesan:*\n"
            . $itemsText . "\n"
            . "Mohon dikirimkan informasi ketersediaan stok dan penawaran harganya. Terima kasih!";

        $whatsappUrl = "https://wa.me/{$adminPhone}?text=" . urlencode($message);

        return redirect()->away($whatsappUrl);
    }
}