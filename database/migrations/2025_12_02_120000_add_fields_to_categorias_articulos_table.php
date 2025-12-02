<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Si la tabla no existe (por inconsistencias), crearla completamente
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

            return;
        }

        Schema::table('categorias_articulos', function (Blueprint $table) {
            if (! Schema::hasColumn('categorias_articulos', 'Descripcion_Categoria')) {
                $table->text('Descripcion_Categoria')->nullable();
            }

            if (! Schema::hasColumn('categorias_articulos', 'Foto_Categoria')) {
                $table->string('Foto_Categoria')->nullable();
            }

            if (! Schema::hasColumn('categorias_articulos', 'Cod_Carrera')) {
                $table->unsignedBigInteger('Cod_Carrera')->nullable();

                if (Schema::hasTable('carreras')) {
                    $table->foreign('Cod_Carrera')->references('Cod_Carrera')->on('carreras');
                }
            }
        });
    }

    public function down(): void
    {
        Schema::table('categorias_articulos', function (Blueprint $table) {
            if (Schema::hasColumn('categorias_articulos', 'Cod_Carrera')) {
                // intentar eliminar FK si existe
                try {
                    $table->dropForeign(['Cod_Carrera']);
                } catch (\Throwable $e) {
                    // ignore
                }
                $table->dropColumn('Cod_Carrera');
            }

            if (Schema::hasColumn('categorias_articulos', 'Foto_Categoria')) {
                $table->dropColumn('Foto_Categoria');
            }

            if (Schema::hasColumn('categorias_articulos', 'Descripcion_Categoria')) {
                $table->dropColumn('Descripcion_Categoria');
            }
        });
    }
};
