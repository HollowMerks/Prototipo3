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
        Schema::create('ventas_entre_usuarios', function (Blueprint $table) {
            $table->id('ID_Venta');
            $table->unsignedBigInteger('ID_Vendedor');
            $table->unsignedBigInteger('ID_Comprador');
            $table->unsignedBigInteger('Articulo_ID');
            $table->decimal('Precio_Venta', 10, 2);
            $table->dateTime('Fecha_Venta');
            $table->foreign('ID_Vendedor')->references('ID_Usuario')->on('usuarios_campus_markets');
            $table->foreign('ID_Comprador')->references('ID_Usuario')->on('usuarios_campus_markets');
            $table->foreign('Articulo_ID')->references('id')->on('articulo_ventas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas_entre_usuarios');
    }
};
