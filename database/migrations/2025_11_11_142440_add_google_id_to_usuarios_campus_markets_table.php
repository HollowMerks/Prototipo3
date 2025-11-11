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
        Schema::table('usuarios_campus_markets', function (Blueprint $table) {
            $table->string('google_id')->nullable()->unique()->after('Correo_Electronico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios_campus_markets', function (Blueprint $table) {
            $table->dropColumn('google_id');
        });
    }
};
