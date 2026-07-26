<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkoutWhatsApp(Request $request)
    {
        $user = Auth::user();
        $cart = session()->get('cart', []);

        // Jika keranjang kosong, kembalikan ke halaman katalog dengan notifikasi
        if (empty($cart)) {
            return redirect()->route('katalog')->with('error', 'Keranjang belanja Anda masih kosong.');
        }

        // 1. Simpan Draf Order ke Database
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
        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $productId,
                'quantity'   => $item['quantity'],
            ]);

            $itemsText .= "- " . $item['name'] . " (Jumlah: " . $item['quantity'] . ")\n";
        }

        // 2. Kosongkan Keranjang setelah berhasil checkout
        session()->forget('cart');

        // 3. Format Pesan dan Redirect ke WA Admin CV. Wijaya Karya (082142010020)
        $adminPhone = '6289513622252';
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