<?php

namespace App\Filament\Resources\Foros\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ForosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ID_Foro')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('Titulo_Foro')
                    ->label('Título')
                    ->sortable()
                    ->searchable()
                    ->limit(50),

                TextColumn::make('Descripcion_Foro')
                    ->label('Descripción')
                    ->limit(100)
                    ->tooltip(function (TextColumn $column): ?string {
                        $state = $column->getState();
                        if (strlen($state) <= 100) {
                            return null;
                        }

                        return $state;
                    }),

                TextColumn::make('creador.Nombres')
                    ->label('Creador')
                    ->sortable()
                    ->searchable(),

                BooleanColumn::make('Estado_Foro')
                    ->label('Estado'),

                ImageColumn::make('Imagen_Foro')
                    ->label('Imagen')
                    ->circular(),

                TextColumn::make('created_at')
                    ->label('Fecha Creación')
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
