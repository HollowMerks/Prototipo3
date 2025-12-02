<?php

namespace App\Filament\Resources\UsuarioCampusMarkets\Pages;

use App\Filament\Resources\UsuarioCampusMarkets\UsuarioCampusMarketResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Session;

class CreateUsuarioCampusMarket extends CreateRecord
{
    protected static string $resource = UsuarioCampusMarketResource::class;

    protected function getRedirectUrl(): string
    {
        $record = $this->record ?? null;

        // flash custom alert
        if ($record) {
            $name = $record->user->name ?? ($record->Nombre_Usuario ?? 'Usuario creado');
            Session::flash('custom_alert', [
                'message' => "Se creó el usuario: <strong>{$name}</strong>",
                'type' => 'success',
            ]);
        }

        // Después de crear, redirigir a la lista (index) para ver la tabla
        return $this->getResource()::getUrl('index');
    }
}
