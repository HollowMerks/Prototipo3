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
            $table->foreignId('ID_Usuario')->constrained('usuarios_campus_markets', 'ID_Usuario');
            $table->string('Titulo_Notificacion', 150);
            $table->text('Mensaje_Notificacion');
            $table->string('imgen')->nullable();
            $table->string('icono')->nullable();
            $table->string('link');
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
