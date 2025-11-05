<?php

namespace App\Filament\Resources\ReputacionEntreUsuarios\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReputacionEntreUsuariosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ID_Reputacion')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('calificador.Nombres')
                    ->label('Calificador')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('calificado.Nombres')
                    ->label('Calificado')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('Puntuacion')
                    ->label('Puntuación')
                    ->sortable(),

                TextColumn::make('Comentario')
                    ->label('Comentario')
                    ->limit(50),

                TextColumn::make('created_at')
                    ->label('Fecha')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ]);
    }
}
