<?php

namespace App\Http\Controllers;

use App\Exports\AdminNotificationsExport;
use App\Models\Admin_notificaciones;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminNotificationsReporteController extends Controller
{
    public function generarExcel()
    {
        return Excel::download(new AdminNotificationsExport, 'reporte_notificaciones_' . date('Y-m-d') . '.xlsx');
    }

    public function generarPDF()
    {
        $notificaciones = Admin_notificaciones::with('usuario.user')->get();

        $pdf = Pdf::loadView('reportes.admin_notifications', compact('notificaciones'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('reporte_notificaciones_' . date('Y-m-d') . '.pdf');
    }
}
