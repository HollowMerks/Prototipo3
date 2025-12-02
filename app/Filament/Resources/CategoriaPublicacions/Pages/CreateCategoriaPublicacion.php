<?php

namespace App\Filament\Resources\CategoriaPublicacions\Pages;

use App\Filament\Resources\CategoriaPublicacions\CategoriaPublicacionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateCategoriaPublicacion extends CreateRecord
{
    protected static string $resource = CategoriaPublicacionResource::class;

    protected function getRedirectUrl(): string
    {
        $record = $this->record ?? null;

        if ($record) {
            return $this->getResource()::getUrl('edit', ['record' => $record->getKey()]);
        }

        return $this->getResource()::getUrl('index');
    }
}
