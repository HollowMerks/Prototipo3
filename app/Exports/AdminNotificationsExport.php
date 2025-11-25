<?php

namespace App\Exports;

use App\Models\Admin_notificaciones;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AdminNotificationsExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Admin_notificaciones::with('usuario.user')->get();
    }

    public function headings(): array
    {
        return [
            'ID_Notificacion',
            'Usuario',
            'Título',
            'Mensaje',
            'Estado',
            'Fecha_Envio',
        ];
    }

    public function map($notificacion): array
    {
        return [
            $notificacion->ID_Notificacion,
            $notificacion->usuario->user->name ?? null,
            $notificacion->Titulo_Notificacion,
            $notificacion->Mensaje_Notificacion,
            $notificacion->Estado_Notificacion,
            optional($notificacion->Fecha_Envio)->format('Y-m-d H:i:s'),
        ];
    }
}
