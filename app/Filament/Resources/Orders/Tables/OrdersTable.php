<?php

namespace App\Filament\Resources\Orders\Tables;

use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class OrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->label('No. Order')
                    ->searchable(),
                Tables\Columns\TextColumn::make('visitor_name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('visitor_phone')
                    ->label('No HP'),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'deal',
                        'danger' => 'cancelled',
                    ]),
                Tables\Columns\TextColumn::make('total_price')
                    ->label('Harga Deal')
                    ->money('IDR'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Order')
                    ->dateTime(),
            ])
            ->actions([
                EditAction::make(),
            ]);
    }
}