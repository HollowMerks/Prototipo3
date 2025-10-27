<?php

namespace App\Filament\Resources\Universidades\Pages;

use App\Filament\Resources\Universidades\UniversidadesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListUniversidades extends ListRecords
{
    protected static string $resource = UniversidadesResource::class;

    protected string $view = 'filament.resources.universidades-resource.pages.list-universidades';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Crear Nueva Universidad')
                ->slideOver(false),
        ];

    }
}
