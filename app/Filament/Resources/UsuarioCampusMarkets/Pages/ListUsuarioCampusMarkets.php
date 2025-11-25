<?php

namespace App\Filament\Resources\UsuarioCampusMarkets\Pages;

use App\Filament\Resources\UsuarioCampusMarkets\UsuarioCampusMarketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsuarioCampusMarkets extends ListRecords
{
    protected static string $resource = UsuarioCampusMarketResource::class;

    protected string $view = 'filament.resources.usuario-campus-markets-resource.pages.list-usuario-campus-markets';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Crear Nuevo Usuario Campus Market'),

            Actions\Action::make('reporte_pdf')
                ->label('Descargar PDF')
                ->url(route('reporte.usuarios.pdf'))
                ->openUrlInNewTab()
                ->icon('heroicon-o-document-text')
                ->color('success'),

            Actions\Action::make('reporte_excel')
                ->label('Descargar Excel')
                ->url(route('reporte.usuarios.excel'))
                ->openUrlInNewTab()
                ->icon('heroicon-o-document-arrow-down')
                ->color('success'),
            Actions\Action::make('reporte_imagen')
                ->label('Descargar Imagen')
                ->url(route('reporte.usuarios.imagen'))
                ->openUrlInNewTab()
                ->icon('heroicon-o-photo')
                ->color('success'),
        ];
    }
}
