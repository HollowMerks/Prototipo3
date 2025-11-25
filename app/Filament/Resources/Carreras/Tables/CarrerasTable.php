<?php

namespace App\Filament\Resources\Carreras\Tables;

use App\Exports\CarrerasExport;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\Action;
use Filament\Tables\Table;
use Maatwebsite\Excel\Facades\Excel;

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
                EditAction::make(),
            ])
            ->headerActions([
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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
