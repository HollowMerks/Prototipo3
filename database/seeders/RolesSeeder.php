<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            ['Nombre_Rol' => 'SuperAdministrador', 'Descripcion' => 'Acceso total', 'created_at' => now(), 'updated_at' => now()],
            ['Nombre_Rol' => 'Moderador', 'Descripcion' => 'Acceso moderado', 'created_at' => now(), 'updated_at' => now()],
            ['Nombre_Rol' => 'Estudiante', 'Descripcion' => 'Rol por defecto', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
