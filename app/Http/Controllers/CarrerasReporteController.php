<?php

namespace App\Http\Controllers;

use App\Exports\CarrerasExport;
use App\Models\Carrera;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class CarrerasReporteController extends Controller
{
    /**
     * Generar reporte de carreras en Excel
     */
    public function generarExcel()
    {
        return Excel::download(new CarrerasExport, 'reporte_carreras_' . date('Y-m-d') . '.xlsx');
    }

    /**
     * Generar reporte de carreras en PDF
     */
    public function generarPDF()
    {
        $carreras = Carrera::with('universidad')->get();

        $pdf = Pdf::loadView('reportes.carreras', compact('carreras'))
            ->setPaper('a4', 'landscape')
            ->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('reporte_carreras_' . date('Y-m-d') . '.pdf');
    }

    /**
     * Generar reporte de carreras por universidad en PDF
     */
    public function generarPDFPorUniversidad($universidadId)
    {
        $carreras = Carrera::where('ID_Universidad', $universidadId)
            ->with('universidad')
            ->get();

        $universidad = $carreras->first()?->universidad;

        $pdf = Pdf::loadView('reportes.carreras-por-universidad', compact('carreras', 'universidad'))
            ->setPaper('a4', 'landscape')
            ->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->download('carreras_' . $universidad?->Nombre_Universidad . '_' . date('Y-m-d') . '.pdf');
    }

    /**
     * Generar imagen (PNG) a partir del PDF si Imagick está disponible
     */
    public function generarImagen()
    {
        $carreras = Carrera::with('universidad')->get();

        $pdf = Pdf::loadView('reportes.carreras', compact('carreras'))
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
                    ->header('Content-Disposition', 'attachment; filename="carreras_' . date('Y-m-d') . '.png"');
            } catch (\Exception $e) {
                // fallback: devolver pdf si la conversión falla
                return response($pdfOutput, 200)
                    ->header('Content-Type', 'application/pdf')
                    ->header('Content-Disposition', 'attachment; filename="reporte_carreras_' . date('Y-m-d') . '.pdf"');
            }
        }

        // Si Imagick no está disponible, devolver un 501 con mensaje informativo
        return response()->json([
            'error' => 'Conversión a imagen no disponible en el servidor. Instale la extensión Imagick para habilitarla.'
        ], 501);
    }
}
