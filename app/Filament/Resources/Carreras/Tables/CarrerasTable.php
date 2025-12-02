<?php

namespace App\Filament\Resources\Carreras\Tables;

use App\Exports\CarrerasExport;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Tables\Table;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;

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
                Action::make('recuperar')
                    ->label('Recuperar')
                    ->icon('heroicon-o-arrow-path')
                    ->color('success')
                    ->visible(fn ($record) => $record->trashed())
                    ->requiresConfirmation()
                    ->modalHeading('¿Recuperar esta carrera?')
                    ->modalDescription('La carrera será restaurada y volverá a la lista activa.')
                    ->modalSubmitActionLabel('Recuperar')
                    ->action(function ($record) {
                        try {
                            $record->restore();
                            session()->flash('custom_alert', ['message' => 'Carrera recuperada correctamente.', 'type' => 'success']);
                            return redirect()->route('filament.admin.resources.carreras.index');
                        } catch (\Exception $e) {
                            session()->flash('custom_alert', ['message' => 'Error al recuperar la carrera.', 'type' => 'danger']);
                        }
                    }),

                EditAction::make()
                    ->visible(fn ($record) => ! $record->trashed()),

                Action::make('eliminar')
                    ->label('Eliminar')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->visible(fn ($record) => ! $record->trashed())
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        try {
                            $record->delete();
                            session()->flash('custom_alert', ['message' => 'Carrera archivada correctamente.', 'type' => 'warning']);
                        } catch (\Exception $e) {
                            session()->flash('custom_alert', ['message' => 'Error al archivar la carrera.', 'type' => 'danger']);
                        }
                    }),
            ])
            ->headerActions([
                Action::make('recargar')
                    ->label('Recargar')
                    ->icon('heroicon-o-arrow-path')
                    ->url(fn () => url()->current())
                    ->color('secondary'),

                CreateAction::make()
                    ->label('Crear Nueva Carrera')
                    ->slideOver(false)
                    ->visible(fn () => ! str_contains(url()->current(), '/trashed')),

                Action::make('reporte_pdf')
                    ->label('Descargar PDF')
                    ->url(route('reporte.carreras.pdf'))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-document-text')
                    ->color('success'),

                Action::make('reporte_imagen')
                    ->label('Descargar Imagen')
                    ->url(route('reporte.carreras.imagen'))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-photo')
                    ->color('success'),

                Action::make('export_excel')
                    ->label('Descargar Excel')
                    ->action(fn () => Excel::download(new CarrerasExport, 'carreras_' . date('Y-m-d') . '.xlsx'))
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success'),

                Action::make('ver_archivadas')
                    ->label('Ver Archivadas')
                    ->url(fn () => \App\Filament\Resources\Carreras\CarrerasResource::getUrl('trashed'))
                    ->icon('heroicon-o-archive-box')
                    ->color('danger')
                    ->visible(fn () => ! str_contains(url()->current(), '/trashed')),
                Action::make('ver_activas')
                    ->label('Ver Activas')
                    ->url(fn () => \App\Filament\Resources\Carreras\CarrerasResource::getUrl('index'))
                    ->icon('heroicon-o-bookmark-square')
                    ->color('success')
                    ->visible(fn () => str_contains(url()->current(), '/trashed')),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
