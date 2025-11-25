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

    /**
     * Generar imagen (PNG) a partir del PDF si Imagick está disponible
     */
    public function generarImagen()
    {
        $usuarios = UsuariosCampusMarket::with('user', 'carrera', 'carrera.universidad')->get();
        $pdf = Pdf::loadView('reportes.usuarios', compact('usuarios'));

        $pdfOutput = $pdf->output();

        if (extension_loaded('imagick')) {
            try {
                $im = new \Imagick();
                $im->readImageBlob($pdfOutput);
                $im->setImageFormat('png');
                $png = $im->getImagesBlob();

                return response($png, 200)
                    ->header('Content-Type', 'image/png')
                    ->header('Content-Disposition', 'attachment; filename="usuarios_' . date('Y-m-d') . '.png"');
            } catch (\Exception $e) {
                return response($pdfOutput, 200)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'attachment; filename="reporte_usuarios_' . date('Y-m-d') . '.pdf"');
            }
        }

        return response()->json([
            'error' => 'Conversión a imagen no disponible en el servidor. Instale la extensión Imagick para habilitarla.'
        ], 501);
    }
}
