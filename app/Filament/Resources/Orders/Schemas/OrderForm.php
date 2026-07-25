<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_number')
                    ->required(),
                TextInput::make('user_id')
                    ->numeric(),
                TextInput::make('visitor_name')
                    ->required(),
                TextInput::make('visitor_phone')
                    ->tel()
                    ->required(),
                TextInput::make('visitor_email')
                    ->email()
                    ->required(),
                Textarea::make('visitor_address')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('visitor_purpose')
                    ->required(),
                TextInput::make('total_price')
                    ->numeric()
                    ->prefix('$'),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'deal' => 'Deal', 'cancelled' => 'Cancelled'])
                    ->default('pending')
                    ->required(),
                Textarea::make('admin_notes')
                    ->columnSpanFull(),
            ]);
    }
}
