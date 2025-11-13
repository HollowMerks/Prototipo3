<?php

namespace App\Filament\Resources\UsuarioCampusMarkets\Tables;

use Filament\Actions\Action;
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
                            'wire:click.prevent' => "Livewire.emit('showPhoto', '".url('storage/'.$record->Foto_de_perfil)."')",
                            'style' => 'cursor:pointer',
                        ];
                    }),
                TextColumn::make('user.name')->label('Nombres')->sortable()->searchable(),
                TextColumn::make('Apellidos')->label('Apellidos')->sortable()->searchable(),
                TextColumn::make('user.email')->label('Correo Electrónico')->sortable()->searchable(),
                TextColumn::make('Telefono')->label('Teléfono')->sortable()->searchable(),
                TextColumn::make('Estado')->label('Estado'),
                TextColumn::make('Genero')->label('Género')->sortable()->searchable(),
                TextColumn::make('carrera.Nombre_Carrera')->label('Carrera')->sortable()->searchable(),
                TextColumn::make('carrera.universidad.Nombre_Universidad')->label('Universidad')->sortable()->searchable(),
                TextColumn::make('Cod_Rol')
                    ->label('Rol')
                    ->sortable()
                    ->searchable()
                    ->formatStateUsing(fn ($state) => match ($state) {
                        1 => 'SuperAdministrador',
                        2 => 'Moderador',
                        3 => 'Estudiante',
                        default => 'Desconocido',
                    }),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                Action::make('toggleEstado')
                    ->label(fn ($record) => $record->Estado === 'Habilitado' ? 'Inhabilitar' : 'Habilitar')
                    ->button()
                    ->color(fn ($record) => $record->Estado === 'Habilitado' ? 'danger' : 'success')
                    ->requiresConfirmation()
                    ->modalHeading(fn ($record) => $record->Estado === 'Habilitado' ? '¿Inhabilitar usuario?' : '¿Habilitar usuario?')
                    ->modalDescription(fn ($record) => $record->Estado === 'Habilitado'
                        ? '¿Estás seguro de que quieres inhabilitar a este usuario?'
                        : '¿Estás seguro de que quieres habilitar a este usuario?')
                    ->modalSubmitActionLabel('Confirmar')
                    ->modalCancelActionLabel('Cancelar')
                    ->action(function ($record) {
                        $record->Estado = $record->Estado === 'Habilitado' ? 'Inhabilitado' : 'Habilitado';
                        $record->save();
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
