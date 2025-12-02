<?php

namespace App\Filament\Resources\UsuarioCampusMarkets\Pages;

use App\Filament\Resources\UsuarioCampusMarkets\UsuarioCampusMarketResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Session;

class EditUsuarioCampusMarket extends EditRecord
{
    protected static string $resource = UsuarioCampusMarketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        $name = $this->record->user->name ?? ($this->record->Nombre_Usuario ?? null);
        Session::flash('custom_alert', [
            'message' => $name ? "Se actualizó el usuario: <strong>{$name}</strong>" : 'Usuario actualizado',
            'type' => 'success',
        ]);

        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Mantener la contraseña para mostrarla al editar
        // No hacer unset aquí

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Si la contraseña está vacía, no la actualices
        if (empty($data['Contrasena'])) {
            unset($data['Contrasena']);
        }

        return $data;
    }
}
