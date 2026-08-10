<?php

namespace App\Filament\Resources\Guides\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GuideForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Panduan')
                    ->schema([
                        Select::make('type')
                            ->label('Tipe Panduan')
                            ->options([
                                'starter_kit' => 'Starter Kit (Panduan Teks)',
                                'video'        => 'Video Tutorial',
                            ])
                            ->required()
                            ->live(),

                        TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('subtitle')
                            ->label('Subjudul / Deskripsi Singkat')
                            ->maxLength(255),

                        TextInput::make('category')
                            ->label('Kategori')
                            ->maxLength(255),

                        TextInput::make('icon')
                            ->label('Ikon (Emoji)')
                            ->default('🛠️')
                            ->maxLength(10),

                        TextInput::make('duration')
                            ->label('Durasi / Estimasi Pengerjaan')
                            ->placeholder('Contoh: 30-45 Menit atau 05:20')
                            ->maxLength(100),

                        Toggle::make('is_active')
                            ->label('Aktif / Tampil di Website')
                            ->default(true),
                    ])->columns(2),

                Section::make('URL Video YouTube')
                    ->schema([
                        TextInput::make('youtube_url')
                            ->label('URL Embed YouTube')
                            ->url()
                            ->placeholder('https://www.youtube.com/embed/...')
                            ->columnSpanFull(),
                    ])
                    ->visible(fn ($get) => $get('type') === 'video'),

                Section::make('Alat & Bahan Yang Dibutuhkan')
                    ->schema([
                        Repeater::make('tools_and_materials')
                            ->label('')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Alat / Bahan')
                                    ->required()
                                    ->columnSpan(1),
                                TextInput::make('desc')
                                    ->label('Keterangan')
                                    ->columnSpan(2),
                            ])
                            ->columns(3)
                            ->addActionLabel('Tambah Alat / Bahan')
                            ->collapsible()
                            ->defaultItems(0),
                    ])
                    ->visible(fn ($get) => $get('type') === 'starter_kit'),

                Section::make('Langkah-Langkah Pengerjaan')
                    ->schema([
                        Repeater::make('steps')
                            ->label('')
                            ->schema([
                                TextInput::make('title')
                                    ->label('Judul Langkah')
                                    ->required()
                                    ->columnSpanFull(),
                                Textarea::make('description')
                                    ->label('Penjelasan Langkah')
                                    ->rows(3)
                                    ->columnSpanFull(),
                            ])
                            ->addActionLabel('Tambah Langkah')
                            ->collapsible()
                            ->defaultItems(0),
                    ])
                    ->visible(fn ($get) => $get('type') === 'starter_kit'),
            ]);
    }
}
