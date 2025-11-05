<?php

namespace App\Filament\Resources\VentaEntreUsuarios\Pages;

use App\Filament\Resources\VentaEntreUsuarios\VentaEntreUsuariosResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditVentaEntreUsuarios extends EditRecord
{
    protected static string $resource = VentaEntreUsuariosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
