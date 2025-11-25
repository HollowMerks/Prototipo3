<?php

namespace App\Http\Controllers;

use App\Exports\UniversidadesExport;
use App\Models\Universidades;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class UniversidadesReporteController extends Controller
{
    /**
     * Generar reporte de universidades en Excel
     */
    public function generarExcel()
    {
        return Excel::download(new UniversidadesExport, 'reporte_universidades_' . date('Y-m-d') . '.xlsx');
    }

    /**
     * Generar reporte de universidades en PDF
     */
    public function generarPDF()
    {
        $universidades = Universidades::all();

        $pdf = Pdf::loadView('reportes.universidades', compact('universidades'))
            ->setPaper('a4', 'landscape')
            ->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('reporte_universidades_' . date('Y-m-d') . '.pdf');
    }

    /**
     * Generar reporte de universidades con detalles extendidos
     */
    public function generarPDFDetallado()
    {
        $universidades = Universidades::with('carreras')->get();

        $pdf = Pdf::loadView('reportes.universidades-detallado', compact('universidades'))
            ->setPaper('a4', 'landscape')
            ->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('universidades_detallado_' . date('Y-m-d') . '.pdf');
    }

    /**
     * Generar imagen (PNG) a partir del PDF si Imagick está disponible
     */
    public function generarImagen()
    {
        $universidades = Universidades::all();

        $pdf = Pdf::loadView('reportes.universidades', compact('universidades'))
            ->setPaper('a4', 'landscape')
            ->setOptions(['defaultFont' => 'sans-serif']);

        $pdfOutput = $pdf->output();

        if (extension_loaded('imagick')) {
            try {
                $im = new \Imagick();
                $im->readImageBlob($pdfOutput);
                $im->setImageFormat('png');
                $png = $im->getImagesBlob();

                return response($png, 200)
                    ->header('Content-Type', 'image/png')
                    ->header('Content-Disposition', 'attachment; filename="universidades_' . date('Y-m-d') . '.png"');
            } catch (\Exception $e) {
                return response($pdfOutput, 200)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'attachment; filename="reporte_universidades_' . date('Y-m-d') . '.pdf"');
            }
        }

        return response()->json([
            'error' => 'Conversión a imagen no disponible en el servidor. Instale la extensión Imagick para habilitarla.'
        ], 501);
    }
}
