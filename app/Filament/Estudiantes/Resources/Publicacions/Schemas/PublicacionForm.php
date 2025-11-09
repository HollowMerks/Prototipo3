<?php

namespace App\Filament\Estudiantes\Resources\Publicacions\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PublicacionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('Titulo_Publicacion')
                    ->required()
                    ->maxLength(255),
                Textarea::make('Descripcion_Publicacion')
                    ->required(),
                Toggle::make('Estado_Publicacion'),
                TextInput::make('Precio_Publicacion')
                    ->numeric()
                    ->prefix('$'),
                FileUpload::make('Imagen_Publicacion')
                    ->image(),
                Select::make('Cod_Categoria')
                    ->relationship('categoria', 'Nombre_Categoria')
                    ->required(),
                Select::make('ID_Vendedor')
                    ->relationship('vendedor', 'Nombre_Usuario')
                    ->required(),
            ]);
    }
}
