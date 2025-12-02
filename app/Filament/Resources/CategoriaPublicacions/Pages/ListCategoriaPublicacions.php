<?php

namespace App\Filament\Resources\CategoriaPublicacions\Pages;

use App\Filament\Resources\CategoriaPublicacions\CategoriaPublicacionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCategoriaPublicacions extends ListRecords
{
    protected static string $resource = CategoriaPublicacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Crear Categoria')
                ->slideOver(false),
        ];
    }
}
