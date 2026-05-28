<?php

namespace App\Filament\Resources\Sites\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class SiteForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('location'),
                Select::make('user_id')
                ->relationship('user', 'name')
                ->required(),
            ]);
    }
}
