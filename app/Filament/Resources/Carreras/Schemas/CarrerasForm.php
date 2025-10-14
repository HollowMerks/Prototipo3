<?php

namespace App\Filament\Resources\Carreras\Schemas;

use App\Models\Universidades;
use Filament\Forms;
use Filament\Schemas\Schema;

class CarrerasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('Nombre_Carrera')
                    ->label('Nombre de la Carrera')
                    ->required()
                    ->maxLength(120)
                    ->columnSpanFull(),

                Forms\Components\Select::make('Cod_Universidad')
                    ->label('Universidad')
                    ->options(Universidades::pluck('Nombre_Universidad', 'Cod_Universidad'))
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull(),
            ]);
    }
}
