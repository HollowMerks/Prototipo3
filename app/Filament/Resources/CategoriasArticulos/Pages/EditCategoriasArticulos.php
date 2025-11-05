<?php

namespace App\Filament\Resources\CategoriasArticulos\Pages;

use App\Filament\Resources\CategoriasArticulos\CategoriasArticulosResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCategoriasArticulos extends EditRecord
{
    protected static string $resource = CategoriasArticulosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
