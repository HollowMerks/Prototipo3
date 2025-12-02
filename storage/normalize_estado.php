<?php
use Illuminate\Support\Facades\DB;

echo "Iniciando normalización de 'Estado' en usuarios_campus_markets\n";

// 1) Trim
DB::statement("UPDATE usuarios_campus_markets SET Estado = TRIM(Estado) WHERE Estado IS NOT NULL");
echo "- Trim aplicado.\n";

// 2) Mapear variantes activas a 'Habilitado'
$activeVariants = ['habilitado','activo','enabled','1','true','si'];
$activeList = "'" . implode("','", $activeVariants) . "'";
DB::statement("UPDATE usuarios_campus_markets SET Estado = 'Habilitado' WHERE LOWER(Estado) IN ($activeList)");
echo "- Variantes activas mapeadas a 'Habilitado'.\n";

// 3) Mapear variantes inactivas a 'Inhabilitado'
$inactiveVariants = ['inhabilitado','inactiv','inactivo','baneado','suspendido','disabled','0','false'];
$inactiveList = "'" . implode("','", $inactiveVariants) . "'";
DB::statement("UPDATE usuarios_campus_markets SET Estado = 'Inhabilitado' WHERE LOWER(Estado) IN ($inactiveList)");
echo "- Variantes inactivas mapeadas a 'Inhabilitado'.\n";

// 4) Opcional: normalizar mayúsculas (ya lo hacemos con los valores fijos)
// 5) Mostrar resumen
$rows = DB::table('usuarios_campus_markets')->select('Estado', DB::raw('count(*) as c'))->groupBy('Estado')->get();
echo "\nResumen de valores en 'Estado':\n";
foreach ($rows as $r) {
    echo " - {$r->Estado}: {$r->c}\n";
}

echo "Normalización completada.\n";
