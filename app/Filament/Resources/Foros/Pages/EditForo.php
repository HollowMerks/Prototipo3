<?php

namespace App\Filament\Resources\Foros\Pages;

use App\Filament\Resources\Foros\ForoResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditForo extends EditRecord
{
    protected static string $resource = ForoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
