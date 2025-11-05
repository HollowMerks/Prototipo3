<?php

namespace App\Filament\Resources\Publicaciones\Pages;

use App\Filament\Resources\Publicaciones\PublicacionesResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditPublicaciones extends EditRecord
{
    protected static string $resource = PublicacionesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
