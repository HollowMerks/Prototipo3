<?php

namespace App\Filament\Resources\CategoriaPublicacions\Pages;

use App\Filament\Resources\CategoriaPublicacions\CategoriaPublicacionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCategoriaPublicacion extends EditRecord
{
    protected static string $resource = CategoriaPublicacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
