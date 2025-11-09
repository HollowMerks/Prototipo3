<?php

namespace App\Http\Controllers;

use App\Models\UsuariosCampusMarket;
use Barryvdh\DomPDF\Facade\Pdf; // si usas PDF
use Maatwebsite\Excel\Facades\Excel; // si usas Excel
use App\Exports\UsuariosExport;

class ReporteUsuarioController extends Controller
{
    // Generar reporte en PDF
    public function generarPDF()
    {
        $usuarios = UsuariosCampusMarket::all();
        $pdf = Pdf::loadView('reportes.usuarios', compact('usuarios'));

        return $pdf->download('reporte_usuarios.pdf');
    }

    // Generar reporte en Excel
    public function generarExcel()
    {
        return Excel::download(new UsuariosExport, 'reporte_usuarios.xlsx');
    }
}
