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

        // 1. Ambil item keranjang dari DATABASE (bukan Session)
        $cartItems = Cart::with('product')->where('user_id', $user->id)->get();

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
        foreach ($cartItems as $item) {
            if ($item->product) {
                // Simpan item pesanan
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                ]);

                $itemsText .= "- " . $item->product->name . " (Jumlah: " . $item->quantity . ")\n";
            }
        }

        // 3. Kosongkan Keranjang di DATABASE setelah checkout
        Cart::where('user_id', $user->id)->delete();

        // 4. Format Pesan dan Redirect ke WA Admin (0821-4201-0020 / 6282142010020)
        $adminPhone = '6282142010020'; // atau gunakan 6289513622252 sesuai nomor tujuanmu
        
        $message = "Halo Mitra Irigasi,\n\n"
            . "Saya mau mengajukan pemesanan/penawaran produk berikut:\n"
            . "Nomor Pesanan: {$order->order_number}\n"
            . "Nama: {$order->visitor_name}\n"
            . "No HP: {$order->visitor_phone}\n"
            . "Tujuan: {$order->visitor_purpose}\n\n"
            . "Daftar Produk yang Dipesan:\n"
            . $itemsText . "\n"
            . "Mohon dikirimkan penawaran harganya. Terima kasih!";

        $whatsappUrl = "https://wa.me/{$adminPhone}?text=" . urlencode($message);

        return redirect()->away($whatsappUrl);
    }
}