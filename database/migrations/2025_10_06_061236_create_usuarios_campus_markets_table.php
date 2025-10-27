<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios_campus_markets', function (Blueprint $table) {
            $table->id('ID_Usuario');
            $table->string('Nombres', 120);
            $table->string('Apellidos', 120);
            $table->enum('Genero', ['Hombre', 'Mujer', 'Prefiero no decirlo'])->nullable();
            $table->enum('Estado', ['Habilitado', 'Inhabilitado', 'Baneado', 'Suspendido'])->default('Habilitado');
            $table->string('Correo_Electronico', 120)->unique();
            $table->string('Contrasena');
            $table->string('Telefono')->nullable();
            $table->string('Foto_de_portada')->nullable();
            $table->string('Foto_de_perfil')->nullable();
            $table->foreignId('Cod_Rol')->default(3)->constrained('roles', 'Cod_Rol');
            $table->foreignId('Cod_Carrera')->constrained('carreras', 'Cod_Carrera');
            $table->foreignId('Cod_Universidad')->constrained('universidades', 'Cod_Universidad');
            $table->timestamps();
        });
    }

    // Model logic such as hidden properties or mutators should be placed in the Eloquent model, not in the migration.

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_campus_markets');
    }
};
