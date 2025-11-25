<?php

namespace App\Filament\Resources\AdminNotifications\Pages;

use App\Filament\Resources\AdminNotifications\AdminNotificationResource;
use App\Mail\AdminNotificationMail;
use App\Models\Admin_notificaciones;
use App\Models\UsuariosCampusMarket;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CreateAdminNotification extends CreateRecord
{
    protected static string $resource = AdminNotificationResource::class;

    protected bool $sentWithImage = false;

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

            // Enviar correo electrónico usando el email del usuario desde la tabla users
            if ($usuario->user && $usuario->user->email) {
                try {
                    Mail::to($usuario->user->email)->send(new AdminNotificationMail($notificacion));
                    // Marcar como enviado y registrar fecha
                    $notificacion->Estado_Notificacion = 'Enviado';
                    $notificacion->Fecha_Envio = now();
                    $notificacion->save();
                } catch (\Exception $e) {
                    // Log del error si el envío falla
                    Log::error('Error al enviar notificación a ' . $usuario->user->email . ': ' . $e->getMessage());
                    $notificacion->Estado_Notificacion = 'Error';
                    $notificacion->save();
                }
            }

            $notificaciones[] = $notificacion;
        }

        // Si la notificación incluye una imagen, marcar para redirección al formulario (enviar más)
        $this->sentWithImage = !empty($data['imgen']);

        // Retornar la primera notificación creada para compatibilidad con Filament
        return $notificaciones[0] ?? null;
    }

    protected function getRedirectUrl(): string
    {
        return $this->sentWithImage ? $this->getResource()::getUrl('create') : $this->getResource()::getUrl('index');
    }
}
