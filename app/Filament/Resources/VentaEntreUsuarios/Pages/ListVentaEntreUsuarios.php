<?php

namespace App\Filament\Resources\VentaEntreUsuarios\Pages;

use App\Filament\Resources\VentaEntreUsuarios\VentaEntreUsuariosResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListVentaEntreUsuarios extends ListRecords
{
    protected static string $resource = VentaEntreUsuariosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
