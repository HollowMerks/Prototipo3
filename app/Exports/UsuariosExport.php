<?php

namespace App\Exports;

use App\Models\UsuariosCampusMarket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UsuariosExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UsuariosCampusMarket::with('user', 'carrera', 'carrera.universidad')->get();
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Apellidos',
            'Correo',
            'Estado',
            'Carrera',
            'Universidad',
            'Foto_URL',
        ];
    }

    public function map($usuario): array
    {
        $foto = null;
        if (! empty($usuario->Foto_de_perfil)) {
            $foto = url('storage/' . ltrim($usuario->Foto_de_perfil, '/'));
        }

        return [
            $usuario->user->name ?? null,
            $usuario->Apellidos ?? null,
            $usuario->user->email ?? null,
            $usuario->Estado ?? null,
            $usuario->carrera->Nombre_Carrera ?? null,
            $usuario->carrera->universidad->Nombre_Universidad ?? null,
            $foto,
        ];
    }
}
