<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Usar upsert para evitar duplicados y mantener la descripción actualizada
        DB::table('roles')->upsert([
            ['Nombre_Rol' => 'SuperAdministrador', 'Descripcion' => 'Acceso total', 'created_at' => now(), 'updated_at' => now()],
            ['Nombre_Rol' => 'Moderador', 'Descripcion' => 'Acceso moderado', 'created_at' => now(), 'updated_at' => now()],
            ['Nombre_Rol' => 'Estudiante', 'Descripcion' => 'Rol por defecto', 'created_at' => now(), 'updated_at' => now()],
        ], ['Nombre_Rol'], ['Descripcion', 'updated_at']);
    }
}
