<?php

namespace App\Filament\Resources\Carreras\Pages;

use App\Filament\Resources\Carreras\CarrerasResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Session;

class CreateCarreras extends CreateRecord
{
    protected static string $resource = CarrerasResource::class;

    protected function getRedirectUrl(): string
    {
        // Add custom flash alert for UI
        $name = $this->record->Nombre_Carrera ?? 'Carrera creada';
        Session::flash('custom_alert', [
            'message' => "Se creó la carrera: <strong>{$name}</strong>",
            'type' => 'success',
        ]);

        return $this->getResource()::getUrl('index');
    }
}
