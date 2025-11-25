<?php

namespace App\Exports;

use App\Models\Universidades;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UniversidadesExport implements FromCollection, WithHeadings, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Universidades::select(
            'Nombre_Universidad',
            'Correo_Universidad',
            'Telefono_Universidad',
            'Direccion_Universidad',
            'Sitio_Web',
            'Hora_apertura',
            'Hora_cierre'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Correo',
            'Teléfono',
            'Dirección',
            'Sitio Web',
            'Apertura',
            'Cierre',
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
                    'startColor' => ['rgb' => '059669'],
                ],
                'alignment' => [
                    'horizontal' => 'center',
                    'vertical' => 'center',
                ],
            ],
        ];
    }
}
