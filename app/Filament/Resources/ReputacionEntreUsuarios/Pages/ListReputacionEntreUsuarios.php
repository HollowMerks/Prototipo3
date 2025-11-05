<?php

namespace App\Filament\Resources\ReputacionEntreUsuarios\Pages;

use App\Filament\Resources\ReputacionEntreUsuarios\ReputacionEntreUsuariosResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListReputacionEntreUsuarios extends ListRecords
{
    protected static string $resource = ReputacionEntreUsuariosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
