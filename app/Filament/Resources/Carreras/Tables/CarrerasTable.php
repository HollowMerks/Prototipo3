<?php

namespace App\Filament\Resources\Carreras\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class CarrerasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('Foto_Carrera')
                    ->label('Imagen de la Carrera')
                    ->rounded()
                    ->size(50),
                \Filament\Tables\Columns\TextColumn::make('Nombre_Carrera')
                    ->label('Nombre de la Carrera')
                    ->sortable()
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('universidad.Nombre_Universidad')
                    ->label('Universidad')
                    ->sortable()
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('Duracion_Carrera')
                    ->label('Duración de la Carrera')
                    ->sortable()
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('Descripcion_Carrera')
                    ->label('Descripción de la Carrera')
                    ->sortable()
                    ->searchable(),
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
