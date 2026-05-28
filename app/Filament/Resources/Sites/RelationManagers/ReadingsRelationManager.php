<?php

namespace App\Filament\Resources\Sites\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ReadingsRelationManager extends RelationManager
{
    protected static string $relationship = 'readings';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('value')
                    ->required()
                    ->numeric(),
                Select::make('type')
                    ->options([
                        'consumption' => 'Consumption',
                        'production' => 'Production',
                    ])
                    ->required(),
                DateTimePicker::make('recorded_at')
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('value'),
                TextColumn::make('type'),
                TextColumn::make('recorded_at')->dateTime(),
            ])
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}