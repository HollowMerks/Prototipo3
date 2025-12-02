<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('admin_notificaciones')) {
            return;
        }

        if (!Schema::hasColumn('admin_notificaciones', 'tipo_envio')) {
            Schema::table('admin_notificaciones', function (Blueprint $table) {
                $table->string('tipo_envio')->default('specific_user')->after('ID_Usuario');
            });
        }

        if (!Schema::hasColumn('admin_notificaciones', 'Cod_Rol')) {
            Schema::table('admin_notificaciones', function (Blueprint $table) {
                $table->unsignedBigInteger('Cod_Rol')->nullable()->after('tipo_envio');
                $table->foreign('Cod_Rol')->references('Cod_Rol')->on('roles')->onDelete('set null');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasTable('admin_notificaciones')) {
            return;
        }

        if (Schema::hasColumn('admin_notificaciones', 'Cod_Rol')) {
            Schema::table('admin_notificaciones', function (Blueprint $table) {
                $table->dropForeign(['Cod_Rol']);
                $table->dropColumn('Cod_Rol');
            });
        }

        if (Schema::hasColumn('admin_notificaciones', 'tipo_envio')) {
            Schema::table('admin_notificaciones', function (Blueprint $table) {
                $table->dropColumn('tipo_envio');
            });
        }
    }
};
