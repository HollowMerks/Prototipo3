<?php

namespace App\Filament\Resources\Carreras\Pages;

use App\Filament\Resources\Carreras\CarrerasResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCarreras extends ListRecords
{
    protected static string $resource = CarrerasResource::class;

    protected string $view = 'filament.resources.carreras-resource.pages.list-carreras';

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction moved to table headerActions so it appears alongside downloads
        ];
    }
}
