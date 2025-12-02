<?php
DB::statement('SET FOREIGN_KEY_CHECKS=0');

$tables = DB::select("SHOW TABLES");
foreach ($tables as $t) {
    $tableName = array_values((array)$t)[0];
    DB::statement("DROP TABLE `$tableName`");
}

DB::statement('SET FOREIGN_KEY_CHECKS=1');
echo "Base de datos truncada.\n";
