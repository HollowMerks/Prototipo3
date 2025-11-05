<?php

namespace App\Filament\Resources\ReputacionEntreUsuarios\Schemas;

use App\Models\UsuariosCampusMarket;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ReputacionEntreUsuariosForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('ID_Usuario_Calificador')
                    ->label('Usuario Calificador')
                    ->options(UsuariosCampusMarket::all()->pluck('Nombres', 'ID_Usuario'))
                    ->required()
                    ->searchable(),

                Select::make('ID_Usuario_Calificado')
                    ->label('Usuario Calificado')
                    ->options(UsuariosCampusMarket::all()->pluck('Nombres', 'ID_Usuario'))
                    ->required()
                    ->searchable(),

                TextInput::make('Puntuacion')
                    ->label('Puntuación')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(255)
                    ->required(),

                Textarea::make('Comentario')
                    ->label('Comentario')
                    ->nullable(),
            ]);
    }
}
