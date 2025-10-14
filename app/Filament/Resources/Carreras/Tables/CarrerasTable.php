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
                \Filament\Tables\Columns\TextColumn::make('Nombre_Carrera')
                    ->label('Nombre de la Carrera')
                    ->sortable()
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('universidad.Nombre_Universidad')
                    ->label('Universidad')
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
