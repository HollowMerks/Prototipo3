<?php

namespace App\Filament\Resources\Universidades\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class UniversidadesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('Nombre_Universidad')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('Correo_Universidad')
                    ->label('Correo')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('Telefono_Universidad')
                    ->label('Teléfono')
                    ->searchable(),

                Tables\Columns\TextColumn::make('Direccion_Universidad')
                    ->label('Dirección')
                    ->limit(50),

                Tables\Columns\TextColumn::make('Sitio_Web')
                    ->label('Sitio Web')
                    ->url(fn ($record) => $record->Sitio_Web)
                    ->openUrlInNewTab(),

                Tables\Columns\TextColumn::make('Hora_apertura')
                    ->label('Apertura')
                    ->time('H:i'),

                Tables\Columns\TextColumn::make('Hora_cierre')
                    ->label('Cierre')
                    ->time('H:i'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
