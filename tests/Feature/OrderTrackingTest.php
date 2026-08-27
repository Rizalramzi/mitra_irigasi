<?php

namespace Tests\Feature;

use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class OrderTrackingTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_access_orders_track_page(): void
    {
        $response = $this->get('/orders/track');

        $response->assertStatus(200);
        $response->assertSee('Lacak Status Pesanan');
        $response->assertSee('Masukkan nomor pesanan');
    }

    public function test_tracking_non_existent_order_shows_error(): void
    {
        $response = $this->get('/orders/track?order_number=ORD-NONEXISTENT');

        $response->assertRedirect('/orders/track');
        $response->assertSessionHas('error', 'Nomor pesanan tidak ditemukan. Silakan periksa kembali.');
    }

    public function test_tracking_valid_order_shows_order_details(): void
    {
        // Create user
        $user = User::create([
            'name'            => 'John Doe',
            'email'           => 'john@example.com',
            'password'        => Hash::make('password'),
            'visitor_purpose' => 'Pesan barang',
        ]);

        // Create order
        $order = Order::create([
            'order_number'    => 'ORD-1234567890',
            'user_id'         => $user->id,
            'visitor_name'    => $user->name,
            'visitor_phone'   => '08123456789',
            'visitor_email'   => $user->email,
            'visitor_address' => 'Test Address',
            'visitor_purpose' => $user->visitor_purpose,
            'status'          => 'pending',
        ]);

        $response = $this->get('/orders/track?order_number=ORD-1234567890');

        $response->assertStatus(200);
        $response->assertSee('ORD-1234567890');
        $response->assertSee('John Doe');
        $response->assertSee('Pending / Menunggu');
    }
}
