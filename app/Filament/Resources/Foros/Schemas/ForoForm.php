<?php

namespace App\Filament\Resources\Foros\Schemas;

use App\Models\UsuariosCampusMarket;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ForoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('Titulo_Foro')
                    ->label('Título del Foro')
                    ->required()
                    ->maxLength(200),

                Textarea::make('Descripcion_Foro')
                    ->label('Descripción')
                    ->nullable()
                    ->maxLength(1000),

                Select::make('ID_Creador')
                    ->label('Creador')
                    ->options(UsuariosCampusMarket::all()->pluck('Nombres', 'ID_Usuario'))
                    ->required()
                    ->searchable(),

                Toggle::make('Estado_Foro')
                    ->label('Estado')
                    ->default(true),

                FileUpload::make('Imagen_Foro')
                    ->label('Imagen')
                    ->image()
                    ->nullable(),
            ]);
    }
}
