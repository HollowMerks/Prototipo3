<?php

namespace App\Filament\Resources\UsuarioCampusMarkets\Tables;

use Filament\Actions\Action;
use Filament\Actions\CreateAction;
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
                    ->size(48)
                    ->extraAttributes(function ($record) {
                        return [
                            'wire:click.prevent' => "Livewire.emit('showPhoto', '".url('storage/'.$record->Foto_de_perfil)."')",
                            'style' => 'cursor:pointer',
                        ];
                    }),

                TextColumn::make('user.name')
                    ->label('Nombres')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('Apellidos')
                    ->label('Apellidos')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('user.email')
                    ->label('Correo Electrónico')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('Estado')
                    ->label('Estado')
                    ->sortable(),

                TextColumn::make('carrera.Nombre_Carrera')
                    ->label('Carrera')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('carrera.universidad.Nombre_Universidad')
                    ->label('Universidad')
                    ->sortable()
                    ->searchable(),
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

            ->headerActions([
                Action::make('recargar')
                    ->label('Recargar')
                    ->icon('heroicon-o-arrow-path')
                    ->url(fn () => url()->current())
                    ->color('secondary'),

                CreateAction::make()
                    ->label('Crear Nuevo Usuario Campus Market')
                    ->slideOver(false),

                Action::make('reporte_pdf')
                    ->label('Descargar PDF')
                    ->url(route('reporte.usuarios.pdf'))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-document-text')
                    ->color('success'),

                Action::make('reporte_excel')
                    ->label('Descargar Excel')
                    ->url(route('reporte.usuarios.excel'))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success'),

                Action::make('reporte_imagen')
                    ->label('Descargar Imagen')
                    ->url(route('reporte.usuarios.imagen'))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-photo')
                    ->color('success'),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
