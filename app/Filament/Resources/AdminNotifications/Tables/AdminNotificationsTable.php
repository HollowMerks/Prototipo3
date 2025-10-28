<?php

namespace App\Filament\Resources\AdminNotifications\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AdminNotificationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ID_Notificacion')
                    ->label('ID_Usuario')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('usuario.Nombres')
                    ->label('Usuario')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Titulo_Notificacion')
                    ->label('Título')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Mensaje_Notificacion')
                    ->label('Mensaje')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Estado_Notificacion')
                    ->label('Estado')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Fecha_Envio')
                    ->label('Fecha de Envío')
                    ->sortable()
                    ->dateTime('d/m/Y H:i'),
            ])->actions([
            EditAction::make(),
        ])->bulkActions([
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ]);
    }
}
