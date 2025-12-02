<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class FixMigrations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fix-migrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registrar migraciones pendientes como ejecutadas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $migrations = [
            '2025_11_04_140515_create_articulo_ventas_table',
            '2025_11_04_141327_create_categorias_articulos_table',
            '2025_11_04_143315_create_publicaciones_table',
            '2025_11_04_151520_create_reputacion_entre_usuarios_table',
            '2025_11_04_152329_create_foros_table',
            '2025_11_04_163246_create_ventas_entre_usuarios_table',
            '2025_12_01_000000_add_envio_fields_to_admin_notificaciones',
            '2025_12_01_000001_add_soft_deletes_to_admin_notificaciones',
            '2025_12_02_000001_add_soft_deletes_to_carreras',
            '2025_12_02_000002_add_soft_deletes_to_universidades',
            '2025_12_02_054355_alter_estado_column_to_enum_on_usuarios_campus_markets',
        ];

        foreach ($migrations as $migration) {
            DB::table('migrations')->updateOrInsert(
                ['migration' => $migration],
                ['migration' => $migration, 'batch' => 2]
            );
            $this->info("✓ Migración registrada: {$migration}");
        }

        $this->info("\n✓ Migraciones registradas correctamente.");
    }
}
