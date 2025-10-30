<?php

namespace App\Filament\Resources\AdminNotifications\Pages;

use App\Filament\Resources\AdminNotifications\AdminNotificationResource;
use App\Mail\AdminNotificationMail;
use App\Models\Admin_notificaciones;
use App\Models\UsuariosCampusMarket;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class CreateAdminNotification extends CreateRecord
{
    protected static string $resource = AdminNotificationResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $tipoEnvio = $data['tipo_envio'];
        unset($data['tipo_envio']);

        $usuarios = [];

        if ($tipoEnvio === 'specific_user') {
            $usuarios = [UsuariosCampusMarket::find($data['ID_Usuario'])];
            unset($data['ID_Usuario'], $data['Cod_Rol']);
        } elseif ($tipoEnvio === 'by_role') {
            $usuarios = UsuariosCampusMarket::where('Cod_Rol', $data['Cod_Rol'])->get();
            unset($data['ID_Usuario'], $data['Cod_Rol']);
        } elseif ($tipoEnvio === 'all_users') {
            $usuarios = UsuariosCampusMarket::all();
            unset($data['ID_Usuario'], $data['Cod_Rol']);
        }

        $notificaciones = [];

        foreach ($usuarios as $usuario) {
            $notificacion = Admin_notificaciones::create(array_merge($data, [
                'ID_Usuario' => $usuario->ID_Usuario,
            ]));

            // Enviar correo electrónico
            if ($usuario->Correo_Electronico) {
                Mail::to($usuario->Correo_Electronico)->send(new AdminNotificationMail($notificacion));
            }

            $notificaciones[] = $notificacion;
        }

        // Retornar la primera notificación creada para compatibilidad con Filament
        return $notificaciones[0] ?? null;
    }
}
