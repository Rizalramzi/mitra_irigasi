<?php

namespace App\Filament\Resources\Orders\Tables;

use App\Models\Order;
use Filament\Actions\Action;
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
                Action::make('invoice')
                    ->label('Cetak Invoice')
                    ->icon('heroicon-o-document-text')
                    ->color('success')
                    ->url(fn (Order $record): string => route('orders.invoice', ['order_number' => $record->order_number]))
                    ->openUrlInNewTab(),
            ]);
    }
}