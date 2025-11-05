<?php

namespace App\Filament\Resources\Publicaciones\Pages;

use App\Filament\Resources\Publicaciones\PublicacionesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPublicaciones extends ListRecords
{
    protected static string $resource = PublicacionesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
