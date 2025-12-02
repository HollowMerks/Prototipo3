<?php

namespace App\Filament\Resources\Carreras\Pages;

use App\Filament\Resources\Carreras\CarrerasResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Session;

class EditCarreras extends EditRecord
{
    protected static string $resource = CarrerasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        $name = $this->record->Nombre_Carrera ?? null;
        Session::flash('custom_alert', [
            'message' => $name ? "Se actualizó la carrera: <strong>{$name}</strong>" : 'Carrera actualizada',
            'type' => 'success',
        ]);

        return $this->getResource()::getUrl('index');
    }
}
