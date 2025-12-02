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
        if (! Schema::hasTable('categorias_articulos')) {
            Schema::create('categorias_articulos', function (Blueprint $table) {
                $table->id('Cod_Categoria');
                $table->string('Nombre_Categoria', 100);
                $table->text('Descripcion_Categoria')->nullable();
                $table->string('Foto_Categoria')->nullable();
                $table->unsignedBigInteger('Cod_Carrera')->nullable();
                $table->timestamps();

                if (Schema::hasTable('carreras')) {
                    $table->foreign('Cod_Carrera')->references('Cod_Carrera')->on('carreras');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('categorias_articulos')) {
            Schema::dropIfExists('categorias_articulos');
        }
    }
};
