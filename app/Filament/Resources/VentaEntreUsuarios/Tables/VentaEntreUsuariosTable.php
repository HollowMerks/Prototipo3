<?php

namespace App\Filament\Resources\VentaEntreUsuarios\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class VentaEntreUsuariosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ID_Venta')
                    ->label('ID Venta')
                    ->sortable(),

                TextColumn::make('vendedor.Nombres')
                    ->label('Vendedor')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('comprador.Nombres')
                    ->label('Comprador')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('articulo.Titulo_Articulo')
                    ->label('Artículo')
                    ->sortable()
                    ->searchable()
                    ->limit(30),

                TextColumn::make('Precio_Venta')
                    ->label('Precio')
                    ->money('BS')
                    ->sortable(),

                TextColumn::make('Fecha_Venta')
                    ->label('Fecha de Venta')
                    ->dateTime()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Registrado')
                    ->dateTime()
                    ->sortable(),
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
