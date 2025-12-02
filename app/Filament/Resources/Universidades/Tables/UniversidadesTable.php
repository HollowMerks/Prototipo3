<?php

namespace App\Filament\Resources\Universidades\Tables;

use App\Exports\UniversidadesExport;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Maatwebsite\Excel\Facades\Excel;
use Redirect;

class UniversidadesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('Universisdad_foto_de_perfil')
                    ->label('Foto de perfil')
                    ->circular()
                    ->size(50)
                    ->extraAttributes(function ($record) {
                        return [
                            'wire:click' => "Livewire.emit('showPhoto', '".url('storage/'.$record->Logo_Universidad)."')",
                            'style' => 'cursor:pointer',
                        ];
                    }),
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
                Action::make('recuperar')
                    ->label('Recuperar')
                    ->icon('heroicon-o-arrow-path')
                    ->color('success')
                    ->visible(fn ($record) => $record->trashed())
                    ->requiresConfirmation()
                    ->modalHeading('¿Recuperar esta universidad?')
                    ->modalDescription('La universidad será restaurada y volverá a la lista activa.')
                    ->modalSubmitActionLabel('Recuperar')
                    ->action(function ($record) {
                        try {
                            $record->restore();
                            session()->flash('custom_alert', ['message' => 'Universidad recuperada correctamente.', 'type' => 'success']);
                            return redirect()->route('filament.admin.resources.universidades.index');
                        } catch (\Exception $e) {
                            session()->flash('custom_alert', ['message' => 'Error al recuperar la universidad.', 'type' => 'danger']);
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
                            session()->flash('custom_alert', ['message' => 'Universidad archivada correctamente.', 'type' => 'warning']);
                        } catch (\Exception $e) {
                            session()->flash('custom_alert', ['message' => 'Error al archivar la universidad.', 'type' => 'danger']);
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
                    ->label('Crear Nueva Universidad')
                    ->slideOver(false),

                Action::make('reporte_pdf')
                    ->label('Descargar PDF')
                    ->url(route('reporte.universidades.pdf'))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-document-text')
                    ->color('success'),

                Action::make('reporte_imagen')
                    ->label('Descargar Imagen')
                    ->url(route('reporte.universidades.imagen'))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-photo')
                    ->color('success'),

                Action::make('export_excel')
                    ->label('Descargar Excel')
                    ->action(function () {
                        return Excel::download(new UniversidadesExport, 'universidades.xlsx');
                    })
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success')
                    ->tooltip('Descargar reporte de universidades en Excel'),

                Action::make('ver_archivadas')
                    ->label(fn () => str_contains(url()->current(), '/trashed') ? 'Ver Activas' : 'Ver Archivadas')
                    ->url(fn () => str_contains(url()->current(), '/trashed')
                        ? \App\Filament\Resources\Universidades\UniversidadesResource::getUrl('index')
                        : \App\Filament\Resources\Universidades\UniversidadesResource::getUrl('trashed'))
                    ->icon(fn () => str_contains(url()->current(), '/trashed') ? 'heroicon-o-check-circle' : 'heroicon-o-archive-box')
                    ->color(fn () => str_contains(url()->current(), '/trashed') ? 'success' : 'danger'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
