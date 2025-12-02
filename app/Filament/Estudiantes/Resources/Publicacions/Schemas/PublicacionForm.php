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
                    ->label('Categoría')
                    ->relationship('categoria', 'Nombre_Categoria')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        \Filament\Forms\Components\TextInput::make('Nombre_Categoria')
                            ->label('Nombre de la Categoría')
                            ->required()
                            ->maxLength(100),
                        \Filament\Forms\Components\Textarea::make('Descripcion_Categoria')
                            ->label('Descripción')
                            ->nullable(),
                        \Filament\Forms\Components\FileUpload::make('Foto_Categoria')
                            ->label('Foto de la Categoría')
                            ->image()
                            ->directory('categorias-articulos')
                            ->nullable(),
                        \Filament\Forms\Components\Select::make('Cod_Carrera')
                            ->label('Carrera')
                            ->relationship('carrera', 'Nombre_Carrera')
                            ->required()
                            ->searchable(),
                    ])
                    ->createOptionUsing(fn (array $data): int => \App\Models\CategoriasArticulos::create($data)->getKey()),
                Select::make('ID_Vendedor')
                    ->relationship('vendedor', 'Nombre_Usuario')
                    ->required(),
            ]);
    }
}
