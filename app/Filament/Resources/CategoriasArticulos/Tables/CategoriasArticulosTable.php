<?php

namespace App\Filament\Resources\CategoriasArticulos\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CategoriasArticulosExport;

class CategoriasArticulosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Nombre_Categoria')
                    ->label('Nombre')
                    ->searchable(),
                TextColumn::make('Descripcion_Categoria')
                    ->label('Descripción')
                    ->limit(50),
                TextColumn::make('carrera.Nombre_Carrera')
                    ->label('Carrera')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Creado')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('Cod_Carrera')
                    ->label('Carrera')
                    ->relationship('carrera', 'Nombre_Carrera'),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->headerActions([
                Action::make('recargar')
                    ->label('Recargar')
                    ->icon('heroicon-o-arrow-path')
                    ->url(fn () => url()->current())
                    ->color('secondary'),

                CreateAction::make()
                    ->label('Crear Categoria')
                    ->slideOver(false),

                Action::make('reporte_pdf')
                    ->label('Descargar PDF')
                    ->url(route('reporte.categorias.pdf'))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-document-text')
                    ->color('success'),

                Action::make('export_excel')
                    ->label('Descargar Excel')
                    ->action(fn () => Excel::download(new CategoriasArticulosExport, 'categorias_articulos_' . date('Y-m-d') . '.xlsx'))
                    ->icon('heroicon-o-document-arrow-down')
                    ->color('success'),

                Action::make('ver_archivadas')
                    ->label(fn () => str_contains(url()->current(), '/trashed') ? 'Ver Activas' : 'Ver Archivadas')
                    ->url(fn () => str_contains(url()->current(), '/trashed')
                        ? \App\Filament\Resources\CategoriasArticulos\CategoriasArticulosResource::getUrl('index')
                        : \App\Filament\Resources\CategoriasArticulos\CategoriasArticulosResource::getUrl('trashed'))
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
