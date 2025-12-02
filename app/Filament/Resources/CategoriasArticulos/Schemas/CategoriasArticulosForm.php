<?php

namespace App\Filament\Resources\CategoriasArticulos\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CategoriasArticulosForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('Nombre_Categoria')
                    ->label('Nombre de la Categoría')
                    ->required()
                    ->maxLength(100),
                Textarea::make('Descripcion_Categoria')
                    ->label('Descripción')
                    ->nullable(),

                \Filament\Forms\Components\FileUpload::make('Foto_Categoria')
                    ->label('Foto de la Categoría')
                    ->image()
                    ->directory('categorias-articulos')
                    ->nullable(),
                Select::make('Cod_Carrera')
                    ->label('Carrera')
                    ->relationship('carrera', 'Nombre_Carrera')
                    ->required()
                    ->searchable(),
            ]);
    }
}
