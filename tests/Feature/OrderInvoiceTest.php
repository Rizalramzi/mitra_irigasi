<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class OrderInvoiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_invoice_returns_404_for_non_existent_order(): void
    {
        $response = $this->get('/orders/ORD-NOTFOUND/invoice');

        $response->assertStatus(404);
    }

    public function test_can_view_invoice_for_valid_order(): void
    {
        // Create user
        $user = User::create([
            'name'            => 'Jane Customer',
            'email'           => 'jane@example.com',
            'password'        => Hash::make('password'),
            'visitor_purpose' => 'Pesan barang',
            'phone_number'    => '081299998888',
            'address'         => 'Jl. Pertanian No. 45',
        ]);

        // Create order
        $order = Order::create([
            'order_number'    => 'ORD-9988776655',
            'user_id'         => $user->id,
            'visitor_name'    => $user->name,
            'visitor_phone'   => '081299998888',
            'visitor_email'   => $user->email,
            'visitor_address' => 'Jl. Pertanian No. 45',
            'visitor_purpose' => $user->visitor_purpose,
            'status'          => 'deal',
            'total_price'     => 1500000,
            'admin_notes'     => 'Spesifikasi pompa 2 HP disetujui.',
        ]);

        // Create category & product & order item
        $category = \App\Models\Category::create([
            'name' => 'Pompa & Mesin',
            'slug' => 'pompa-mesin',
        ]);

        $product = Product::create([
            'category_id' => $category->id,
            'name'        => 'Pompa Irigasi 2 HP',
            'slug'        => 'pompa-irigasi-2-hp',
            'code'        => 'PMP-002',
            'description' => 'Pompa air irigasi high pressure',
        ]);

        OrderItem::create([
            'order_id'   => $order->id,
            'product_id' => $product->id,
            'quantity'   => 2,
        ]);

        $response = $this->get('/orders/ORD-9988776655/invoice');

        $response->assertStatus(200);
        $response->assertSee('ORD-9988776655');
        $response->assertSee('Jane Customer');
        $response->assertSee('Pompa Irigasi 2 HP');
        $response->assertSee('PMP-002');
        $response->assertSee('2 pcs');
        $response->assertSee('DEAL / DISETUJUI');
        $response->assertSee('1.500.000');
        $response->assertSee('Spesifikasi pompa 2 HP disetujui.');
        $response->assertSee('MITRA IRIGASI');
    }
}
