<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('role')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'admin_1', 'admin' => 'Admin 1 (Super)',
                        'admin_2'          => 'Admin 2 (Sub)',
                        'visitor'          => 'Visitor',
                        default            => ucfirst($state),
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'admin_1', 'admin' => 'danger',
                        'admin_2'          => 'warning',
                        'visitor'          => 'success',
                        default            => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('phone_number')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('role')
                    ->options([
                        'admin_1' => 'Admin 1 (Super Admin)',
                        'admin_2' => 'Admin 2 (Sub Admin)',
                        'visitor' => 'Visitor',
                    ]),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
