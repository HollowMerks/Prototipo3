<?php

namespace App\Filament\Resources\ReputacionEntreUsuarios\Pages;

use App\Filament\Resources\ReputacionEntreUsuarios\ReputacionEntreUsuariosResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditReputacionEntreUsuarios extends EditRecord
{
    protected static string $resource = ReputacionEntreUsuariosResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
