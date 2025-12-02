-- Active: 1763677801144@@localhost@5545
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
        Schema::table('admin_notificaciones', function (Blueprint $table) {
            if (!Schema::hasColumn('admin_notificaciones', 'deleted_at')) {
                $table->softDeletes();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin_notificaciones', function (Blueprint $table) {
            if (Schema::hasColumn('admin_notificaciones', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
        });
    }
};
