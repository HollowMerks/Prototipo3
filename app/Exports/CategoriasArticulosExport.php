<?php

namespace App\Exports;

use App\Models\CategoriasArticulos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CategoriasArticulosExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return CategoriasArticulos::with('carrera')->get();
    }

    public function headings(): array
    {
        return [
            'Cod_Categoria',
            'Nombre_Categoria',
            'Descripcion_Categoria',
            'Carrera',
            'Creado',
        ];
    }

    public function map($categoria): array
    {
        return [
            $categoria->Cod_Categoria,
            $categoria->Nombre_Categoria,
            $categoria->Descripcion_Categoria,
            $categoria->carrera->Nombre_Carrera ?? null,
            optional($categoria->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}
