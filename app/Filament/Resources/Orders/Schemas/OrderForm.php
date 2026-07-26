<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Visitor')
                    ->schema([
                        Forms\Components\TextInput::make('order_number')
                            ->label('Nomor Pesanan')
                            ->disabled(),
                        Forms\Components\TextInput::make('visitor_name')
                            ->label('Nama Visitor')
                            ->disabled(),
                        Forms\Components\TextInput::make('visitor_phone')
                            ->label('No. WhatsApp / HP')
                            ->disabled(),
                        Forms\Components\TextInput::make('visitor_email')
                            ->label('Email')
                            ->disabled(),
                        Forms\Components\TextInput::make('visitor_purpose')
                            ->label('Tujuan Kunjungan')
                            ->disabled(),
                        Forms\Components\Textarea::make('visitor_address')
                            ->label('Alamat')
                            ->disabled(),
                    ])->columns(2),

                Section::make('Proses Transaksi Admin')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'deal' => 'Deal (Disetujui)',
                                'cancelled' => 'Dibatalkan',
                            ])
                            ->required()
                            ->live(),

                        Forms\Components\TextInput::make('total_price')
                            ->numeric()
                            ->prefix('Rp')
                            ->label('Harga Kesepakatan (Fix Price)')
                            ->required(fn ($get) => $get('status') === 'deal')
                            ->visible(fn ($get) => $get('status') === 'deal'),

                        Forms\Components\Textarea::make('admin_notes')
                            ->label('Catatan Admin')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}