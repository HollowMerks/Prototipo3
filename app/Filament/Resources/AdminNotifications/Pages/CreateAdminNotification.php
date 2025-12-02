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
        $codRol = $data['Cod_Rol'] ?? null;

        $usuarios = [];
        $destinatarioDescripcion = '';

        if ($tipoEnvio === 'specific_user') {
            $usuarios = [UsuariosCampusMarket::find($data['ID_Usuario'])];
            if (!empty($usuarios[0]->user->email)) {
                $destinatarioDescripcion = $usuarios[0]->user->email;
            }
        } elseif ($tipoEnvio === 'by_role') {
            $usuarios = UsuariosCampusMarket::where('Cod_Rol', $codRol)->get();
            // Obtener nombre del rol
            $rol = \App\Models\Roles::find($codRol);
            $destinatarioDescripcion = $rol ? "Rol: {$rol->Nombre_Rol}" : "Rol ID: {$codRol}";
        } elseif ($tipoEnvio === 'all_users') {
            $usuarios = UsuariosCampusMarket::all();
            $destinatarioDescripcion = 'Todos los usuarios';
        }

        $notificaciones = [];

        foreach ($usuarios as $usuario) {
            $notificacion = Admin_notificaciones::create(array_merge($data, [
                'ID_Usuario' => $usuario->ID_Usuario,
                'tipo_envio' => $tipoEnvio,
                'Cod_Rol' => $codRol,
                'Destinatario_Notificacion' => $destinatarioDescripcion,
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

        // Flash a custom alert summarizing the creation
        $count = count($notificaciones);
        if ($count > 0) {
            Session::flash('custom_alert', [
                'message' => "Se crearon {$count} notificación(es) administrativas.",
                'type' => 'success',
            ]);
        }

        // Si la notificación incluye una imagen, marcar para redirección al formulario (enviar más)
        $this->sentWithImage = !empty($data['imgen']);

        // Retornar la primera notificaci�n creada para compatibilidad con Filament
        return $notificaciones[0] ?? null;
    }

    protected function getRedirectUrl(): string
    {
        // Siempre redirigir a la tabla de notificaciones después de enviar
        return $this->getResource()::getUrl('index');
    }
}
