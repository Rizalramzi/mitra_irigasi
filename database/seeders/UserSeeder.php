<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Akun Admin 1 (Super Admin)
        User::updateOrCreate(
            ['email' => 'mitrairigasi.id@gmail.com'],
            [
                'name'            => 'MinRig (Admin 1)',
                'password'        => Hash::make('11111111'),
                'role'            => 'admin_1',
                'phone_number'    => '082142010020',
                'address'         => 'Kantor CV. Wijaya Karya - Mitra Irigasi',
                'visitor_purpose' => 'Konsultasi teknis',
                'permissions'     => null,
            ]
        );

        // 2. Akun Admin 2 (Sub Admin - Contoh: Akses Produk & Pesanan)
        User::updateOrCreate(
            ['email' => 'admin2@mitrairigasi.com'],
            [
                'name'            => 'Staf Admin 2',
                'password'        => Hash::make('11111111'),
                'role'            => 'admin_2',
                'phone_number'    => '082199887766',
                'address'         => 'Kantor CV. Wijaya Karya - Mitra Irigasi',
                'visitor_purpose' => 'Konsultasi teknis',
                'permissions'     => ['products', 'orders'],
            ]
        );

        // 2. Data 5 Akun Visitor
        $visitors = [
            [
                'name'            => 'Budi Santoso',
                'email'           => 'budi.santoso@gmail.com',
                'phone_number'    => '081234567890',
                'address'         => 'Jl. Raya Pertanian No. 12, Malang',
                'visitor_purpose' => 'Pesan barang',
            ],
            [
                'name'            => 'Siti Aminah',
                'email'           => 'siti.aminah@gmail.com',
                'phone_number'    => '082233445566',
                'address'         => 'Desa Sukamaju RT 03/RW 01, Batu',
                'visitor_purpose' => 'Konsultasi teknis',
            ],
            [
                'name'            => 'Eko Prasetyo',
                'email'           => 'eko.prasetyo@yahoo.com',
                'phone_number'    => '085711223344',
                'address'         => 'Kawasan Perkebunan Teh, Pasuruan',
                'visitor_purpose' => 'Pesan barang',
            ],
            [
                'name'            => 'Dewi Lestari',
                'email'           => 'dewi.lestari@gmail.com',
                'phone_number'    => '081987654321',
                'address'         => 'Jl. Perintis Kemerdekaan No. 45, Blitar',
                'visitor_purpose' => 'Konsultasi teknis',
            ],
            [
                'name'            => 'Ahmad Fauzi',
                'email'           => 'ahmad.fauzi@outlook.com',
                'phone_number'    => '083899001122',
                'address'         => 'Kelurahan Kedungkandang, Malang',
                'visitor_purpose' => 'Lain-lain',
            ],
        ];

        // Loop & Simpan Data Visitor
        foreach ($visitors as $visitor) {
            User::updateOrCreate(
                ['email' => $visitor['email']],
                [
                    'name'            => $visitor['name'],
                    'password'        => Hash::make('11111111'), // Password default visitor
                    'role'            => 'visitor',
                    'phone_number'    => $visitor['phone_number'],
                    'address'         => $visitor['address'],
                    'visitor_purpose' => $visitor['visitor_purpose'],
                ]
            );
        }
    }
}