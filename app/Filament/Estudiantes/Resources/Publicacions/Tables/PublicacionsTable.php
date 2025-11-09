<?php

namespace App\Filament\Estudiantes\Resources\Publicacions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PublicacionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Titulo_Publicacion')
                    ->searchable(),
                TextColumn::make('Descripcion_Publicacion')
                    ->limit(50),
                BooleanColumn::make('Estado_Publicacion'),
                TextColumn::make('Precio_Publicacion')
                    ->money('USD'),
                ImageColumn::make('Imagen_Publicacion'),
                TextColumn::make('categoria.Nombre_Categoria'),
                TextColumn::make('vendedor.Nombre_Usuario'),
            ])
            ->filters([
                //
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
