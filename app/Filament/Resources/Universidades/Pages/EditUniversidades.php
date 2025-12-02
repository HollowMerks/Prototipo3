<?php

namespace App\Filament\Resources\Universidades\Pages;

use App\Filament\Resources\Universidades\UniversidadesResource;
use Filament\Actions;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Session;

class EditUniversidades extends EditRecord
{
    protected static string $resource = UniversidadesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->label('Eliminar Universidad'),
        ];
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return 'Universidad actualizada exitosamente';
    }

    protected function getSaveFormAction(): Actions\Action
    {
        return parent::getSaveFormAction()
            ->label('Guardar Cambios');
    }

    protected function getRedirectUrl(): string
    {
        $name = $this->record->Nombre_Universidad ?? null;
        Session::flash('custom_alert', [
            'message' => $name ? "Se actualizó la universidad: <strong>{$name}</strong>" : 'Universidad actualizada',
            'type' => 'success',
        ]);

        return $this->getResource()::getUrl('index');
    }
}
