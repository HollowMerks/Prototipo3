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
        Schema::create('foros', function (Blueprint $table) {
            $table->id('ID_Foro');
            $table->string('Titulo_Foro', 200);
            $table->text('Descripcion_Foro')->nullable();
            $table->unsignedBigInteger('ID_Creador');
            $table->foreign('ID_Creador')->references('ID_Usuario')->on('usuarios_campus_markets');
            $table->boolean('Estado_Foro')->default(true);
            $table->string('Imagen_Foro')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foros');
    }
};
