<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\CreateRecord;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Kredensial')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),
                        TextInput::make('password')
                            ->password()
                            ->dehydrated(fn ($state) => filled($state))
                            ->required(fn ($livewire) => $livewire instanceof CreateRecord)
                            ->maxLength(255),
                    ])->columns(2),

                Section::make('Informasi Profil & Role')
                    ->schema([
                        TextInput::make('phone_number')
                            ->tel()
                            ->maxLength(255),
                        TextInput::make('visitor_purpose')
                            ->maxLength(255),
                        Select::make('role')
                            ->label('Role Akses')
                            ->options([
                                'admin_1' => 'Admin 1 (Super Admin)',
                                'admin_2' => 'Admin 2 (Sub Admin)',
                                'visitor' => 'Visitor',
                            ])
                            ->live()
                            ->required(),
                        Textarea::make('address')
                            ->columnSpanFull(),
                    ])->columns(2),

                Section::make('Hak Akses Fitur (Khusus Admin 2)')
                    ->description('Tentukan fitur mana saja yang dapat diakses oleh akun Admin 2 ini.')
                    ->schema([
                        CheckboxList::make('permissions')
                            ->label('Fitur yang Diizinkan')
                            ->options([
                                'categories' => 'Kategori (Categories)',
                                'products'   => 'Produk (Products)',
                                'orders'     => 'Pesanan (Orders)',
                                'guides'     => 'Panduan (Guides)',
                                'vendors'    => 'Vendor / Pemasok (Vendors)',
                                'users'      => 'Kelola Pengguna (Users)',
                            ])
                            ->columns(2)
                            ->gridDirection('row'),
                    ])
                    ->visible(fn ($get) => $get('role') === 'admin_2'),
            ]);
    }
}
