<?php

namespace App\Filament\Resources\UsuarioCampusMarkets\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsuarioCampusMarketsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('Foto_de_perfil')
                    ->label('Foto de Perfil')
                    ->circular()
                    ->size(50)
                    ->extraAttributes(function ($record) {
                        return [
                            'wire:click' => "Livewire.emit('showPhoto', '".url('storage/'.$record->Foto_de_perfil)."')",
                            'style' => 'cursor:pointer',
                        ];
                    }),
                TextColumn::make('Nombres')
                    ->label('Nombres')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Apellidos')
                    ->label('Apellidos')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Correo_Electronico')
                    ->label('Correo Electrónico')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Estado')
                    ->label('Estado')
                    ->sortable(),
                TextColumn::make('rol.Nombre_Rol')
                    ->label('Rol')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Genero')
                    ->label('Género')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Telefono')
                    ->label('Teléfono')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('Carrera.Nombre_Carrera')
                    ->label('Carrera')
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
