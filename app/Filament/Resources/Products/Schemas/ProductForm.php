<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Services\ImageWebpConverter;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Select::make('vendor_id')
                    ->relationship('vendor', 'name')
                    ->searchable()
                    ->preload(),
                TextInput::make('code')
                    ->maxLength(255),
                TextInput::make('name')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', \Illuminate\Support\Str::slug($state)) : null)
                    ->maxLength(255),
                TextInput::make('slug')
                    ->disabled(fn (string $operation) => $operation === 'edit')
                    ->dehydrated()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->directory('products')
                    ->visibility('public')
                    ->saveUploadedFileUsing(fn (TemporaryUploadedFile $file): string => ImageWebpConverter::convertAndStore($file, 'products', 'public')),
                Textarea::make('description')
                    ->columnSpanFull(),
            ]);
    }
}
