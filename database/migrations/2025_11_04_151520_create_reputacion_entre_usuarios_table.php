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
        Schema::create('reputacion_entre_usuarios', function (Blueprint $table) {
            $table->id('ID_Reputacion');
            $table->unsignedBigInteger('ID_Usuario_Calificador');
            $table->unsignedBigInteger('ID_Usuario_Calificado');
            $table->tinyInteger('Puntuacion')->unsigned();
            $table->text('Comentario')->nullable();
            $table->foreign('ID_Usuario_Calificador')->references('ID_Usuario')->on('usuarios_campus_markets');
            $table->foreign('ID_Usuario_Calificado')->references('ID_Usuario')->on('usuarios_campus_markets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reputacion_entre_usuarios');
    }
};
