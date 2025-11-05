<?php

namespace App\Filament\Resources\CategoriasArticulos\Pages;

use App\Filament\Resources\CategoriasArticulos\CategoriasArticulosResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCategoriasArticulos extends ListRecords
{
    protected static string $resource = CategoriasArticulosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
