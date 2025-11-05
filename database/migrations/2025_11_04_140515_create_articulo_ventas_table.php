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
        Schema::create('articulo_ventas', function (Blueprint $table) {
            $table->id('Articulo_ID');
            $table->string('Titulo_Articulo', 200);
            $table->text('Descripcion_Articulo');
            $table->boolean('Estado_Articulo')->default(true);
            $table->decimal('Precio_Articulo', 10, 2);
            $table->string('Imagen_Articulo')->nullable();
            $table->unsignedBigInteger('Cod_Categoria');
            $table->unsignedBigInteger('ID_Vendedor');
            $table->foreign('Cod_Categoria')->references('Cod_Categoria')->on('categorias_articulos');
            $table->foreign('ID_Vendedor')->references('ID_Usuario')->on('usuarios_campus_markets');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulo_ventas');
    }
};
