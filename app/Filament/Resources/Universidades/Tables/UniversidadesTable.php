<?php

namespace App\Filament\Resources\Universidades\Tables;

use App\Exports\UniversidadesExport;
use Filament\Actions\EditAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Maatwebsite\Excel\Facades\Excel;

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
                EditAction::make(),
            ])
            ->headerActions([
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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
