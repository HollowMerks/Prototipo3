<?php

namespace App\Http\Controllers;

use App\Exports\CategoriasArticulosExport;
use App\Models\CategoriasArticulos;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CategoriasArticulosReporteController extends Controller
{
    public function generarExcel()
    {
        return Excel::download(new CategoriasArticulosExport, 'categorias_articulos_' . date('Y-m-d') . '.xlsx');
    }

    public function generarPDF()
    {
        $categorias = CategoriasArticulos::with('carrera')->get();

        $pdf = Pdf::loadView('reportes.categorias_articulos', compact('categorias'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('categorias_articulos_' . date('Y-m-d') . '.pdf');
    }
}
