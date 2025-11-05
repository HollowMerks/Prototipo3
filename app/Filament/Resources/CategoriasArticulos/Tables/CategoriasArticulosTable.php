<?php

namespace App\Filament\Resources\CategoriasArticulos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class CategoriasArticulosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Nombre_Categoria')
                    ->label('Nombre')
                    ->searchable(),
                TextColumn::make('Descripcion_Categoria')
                    ->label('Descripción')
                    ->limit(50),
                TextColumn::make('carrera.Nombre_Carrera')
                    ->label('Carrera')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('Cod_Carrera')
                    ->label('Carrera')
                    ->relationship('carrera', 'Nombre_Carrera'),
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
