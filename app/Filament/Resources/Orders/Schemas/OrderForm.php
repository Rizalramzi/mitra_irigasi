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

                Section::make('Produk Yang Dipesan')
                    ->schema([
                        Forms\Components\Repeater::make('items')
                            ->relationship('items')
                            ->schema([
                                Forms\Components\Select::make('product_id')
                                    ->relationship('product', 'name')
                                    ->disabled()
                                    ->label('Produk')
                                    ->columnSpan(2),
                                Forms\Components\TextInput::make('quantity')
                                    ->numeric()
                                    ->disabled()
                                    ->label('Jumlah')
                                    ->columnSpan(1),
                            ])
                            ->columns(3)
                            ->disabled()
                            ->addable(false)
                            ->deletable(false)
                            ->reorderable(false)
                            ->label(''),
                    ]),

                Section::make('Proses Transaksi Admin')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'deal' => 'Deal (Disetujui)',
                                'cancelled' => 'Dibatalkan',
                            ])
                            ->required()
                            ->columnSpanFull()
                            ->live(),

                        Forms\Components\TextInput::make('subtotal')
                            ->numeric()
                            ->prefix('Rp')
                            ->label('Harga Sebelum Diskon (Subtotal)')
                            ->required(fn ($get) => $get('status') === 'deal')
                            ->visible(fn ($get) => $get('status') === 'deal')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, $set, $get) {
                                $subtotal = floatval($state ?? 0);
                                $discount = floatval($get('discount_percent') ?? 0);
                                $final = max(0, $subtotal - ($subtotal * ($discount / 100)));
                                $set('total_price', round($final, 2));
                            }),

                        Forms\Components\TextInput::make('discount_percent')
                            ->numeric()
                            ->suffix('%')
                            ->label('Diskon (%)')
                            ->default(0)
                            ->minValue(0)
                            ->maxValue(100)
                            ->required(fn ($get) => $get('status') === 'deal')
                            ->visible(fn ($get) => $get('status') === 'deal')
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, $set, $get) {
                                $subtotal = floatval($get('subtotal') ?? 0);
                                $discount = floatval($state ?? 0);
                                $final = max(0, $subtotal - ($subtotal * ($discount / 100)));
                                $set('total_price', round($final, 2));
                            }),

                        Forms\Components\TextInput::make('total_price')
                            ->numeric()
                            ->prefix('Rp')
                            ->label('Harga Akhir (Setelah Diskon)')
                            ->readOnly()
                            ->dehydrated()
                            ->columnSpanFull()
                            ->required(fn ($get) => $get('status') === 'deal')
                            ->visible(fn ($get) => $get('status') === 'deal'),

                        Forms\Components\Textarea::make('admin_notes')
                            ->label('Catatan Admin')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}