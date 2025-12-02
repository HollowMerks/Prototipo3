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
        Schema::create('admin_notificaciones', function (Blueprint $table) {
            $table->id('ID_Notificacion');
            $table->unsignedBigInteger('ID_Usuario');
            $table->foreign('ID_Usuario')->references('id')->on('usuarios_campus_markets')->onDelete('cascade');
            $table->string('Titulo_Notificacion', 150);
            $table->text('Mensaje_Notificacion');
            $table->string('imgen')->nullable();
            $table->enum('Estado_Notificacion', ['Pendiente', 'Enviado', 'Fallo'])->default('Pendiente');
            $table->timestamp('Fecha_Envio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_notificaciones');
    }
};
