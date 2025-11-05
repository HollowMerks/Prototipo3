<?php

namespace App\Filament\Resources\Foros\Pages;

use App\Filament\Resources\Foros\ForoResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListForos extends ListRecords
{
    protected static string $resource = ForoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
