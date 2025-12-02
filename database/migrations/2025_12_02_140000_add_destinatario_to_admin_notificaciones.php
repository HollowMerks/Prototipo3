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
        if (Schema::hasTable('admin_notificaciones')) {
            // Primero asegurar que tipo_envio existe
            if (!Schema::hasColumn('admin_notificaciones', 'tipo_envio')) {
                Schema::table('admin_notificaciones', function (Blueprint $table) {
                    $table->string('tipo_envio')->default('specific_user')->after('ID_Usuario');
                });
            }

            // Luego asegurar que Cod_Rol existe
            if (!Schema::hasColumn('admin_notificaciones', 'Cod_Rol')) {
                Schema::table('admin_notificaciones', function (Blueprint $table) {
                    $table->unsignedBigInteger('Cod_Rol')->nullable()->after('tipo_envio');
                    $table->foreign('Cod_Rol')->references('Cod_Rol')->on('roles')->onDelete('set null');
                });
            }

            // Finalmente añadir Destinatario_Notificacion
            if (!Schema::hasColumn('admin_notificaciones', 'Destinatario_Notificacion')) {
                Schema::table('admin_notificaciones', function (Blueprint $table) {
                    $table->string('Destinatario_Notificacion')->nullable()->after('tipo_envio')->comment('Email o descripción de destinatario (ej: usuario@example.com, Rol: Estudiante, Todos los usuarios)');
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('admin_notificaciones') && Schema::hasColumn('admin_notificaciones', 'Destinatario_Notificacion')) {
            Schema::table('admin_notificaciones', function (Blueprint $table) {
                $table->dropColumn('Destinatario_Notificacion');
            });
        }
    }
};
