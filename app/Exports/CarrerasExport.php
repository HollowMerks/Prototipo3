<?php

namespace App\Exports;

use App\Models\Carrera;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CarrerasExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Carrera::with('universidad')
            ->select('Nombre_Carrera', 'Duracion_Carrera', 'Descripcion_Carrera')
            ->get()
            ->map(function ($carrera) {
                return [
                    $carrera->Nombre_Carrera,
                    $carrera->Duracion_Carrera,
                    $carrera->Descripcion_Carrera,
                    $carrera->universidad->Nombre_Universidad ?? 'N/A',
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nombre de la Carrera',
            'Duración',
            'Descripción',
            'Universidad',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => [
                    'bold' => true,
                    'color' => ['rgb' => 'FFFFFF'],
                    'size' => 12,
                ],
                'fill' => [
                    'fillType' => 'solid',
                    'startColor' => ['rgb' => '4F46E5'],
                ],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
            ],
        ];
    }
}
