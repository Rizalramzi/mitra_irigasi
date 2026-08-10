<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Pages\CreateRecord;
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
                            ->options([
                                'admin' => 'Admin',
                                'visitor' => 'Visitor',
                            ])
                            ->required(),
                        Textarea::make('address')
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
}
