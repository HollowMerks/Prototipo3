<?php

namespace App\Filament\Resources\Universidades\Pages;

use App\Filament\Resources\Universidades\UniversidadesResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Session;

class CreateUniversidades extends CreateRecord
{
    protected static string $resource = UniversidadesResource::class;

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Universidad creada exitosamente';
    }

    protected function getCreateFormAction(): Actions\Action
    {
        return parent::getCreateFormAction()
            ->label('Crear Universidad');
    }

    protected function getCreateAnotherFormAction(): Actions\Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Crear y Crear Otra');
    }

    protected function getRedirectUrl(): string
    {
        $name = $this->record->Nombre_Universidad ?? 'Universidad creada';
        Session::flash('custom_alert', [
            'message' => "Se creó la universidad: <strong>{$name}</strong>",
            'type' => 'success',
        ]);

        return $this->getResource()::getUrl('index');
    }
}
