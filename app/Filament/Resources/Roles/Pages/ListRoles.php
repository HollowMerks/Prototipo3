<?php

namespace App\Filament\Resources\Roles\Pages;

use App\Filament\Resources\Roles\RolesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListRoles extends ListRecords
{
    protected static string $resource = RolesResource::class;

    protected string $view = 'filament.resources.roles-resource.pages.list-roles';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
