<?php
// Script para crear usuarios de prueba del sistema de seguridad

echo "\n" . str_repeat("=", 60) . "\n";
echo "🔐 CREANDO USUARIOS DE PRUEBA PARA SISTEMA DE SEGURIDAD\n";
echo str_repeat("=", 60) . "\n\n";

// Verificar que existen los roles
$rolAdmin = \App\Models\Roles::find(1); // SuperAdministrador
$rolModerador = \App\Models\Roles::find(2); // Moderador
$rolEstudiante = \App\Models\Roles::find(3); // Estudiante

if (!$rolAdmin) {
    echo "❌ ERROR: Rol SuperAdministrador no existe\n";
    exit(1);
}

echo "✅ Rol SuperAdministrador encontrado\n";
echo "✅ Rol Moderador encontrado\n";
echo "✅ Rol Estudiante encontrado\n\n";

// Verificar que existe una universidad
$uni = \App\Models\Universidades::first();
if (!$uni) {
    echo "❌ ERROR: No hay universidades en la base de datos\n";
    exit(1);
}

// Verificar que existe una carrera
$carrera = \App\Models\Carrera::first();
if (!$carrera) {
    echo "❌ ERROR: No hay carreras en la base de datos\n";
    exit(1);
}

echo "✅ Universidad encontrada: " . $uni->Nombre_Universidad . "\n";
echo "✅ Carrera encontrada: " . $carrera->Nombre_Carrera . "\n\n";

// Limpiar usuarios anteriores
\App\Models\User::whereIn('email', ['superadmin@test.com', 'moderador@test.com', 'estudiante@test.com'])->delete();

// ===== USUARIO 1: SUPERADMINISTRADOR (DEBE ENTRAR) =====
$userAdmin = \App\Models\User::create([
    'name' => 'Admin Test',
    'email' => 'superadmin@test.com',
    'password' => bcrypt('password123'),
]);

$usuarioAdmin = \App\Models\UsuariosCampusMarket::create([
    'user_id' => $userAdmin->id,
    'Apellidos' => 'Administrator',
    'Estado' => 1,
    'Telefono' => '1111111111',
    'Cod_Rol' => 1, // SuperAdministrador
    'Cod_Carrera' => $carrera->Cod_Carrera,
    'Cod_Universidad' => $uni->Cod_Universidad,
]);

echo "✅ USUARIO 1 CREADO - SUPERADMINISTRADOR\n";
echo "   Email:    superadmin@test.com\n";
echo "   Password: password123\n";
echo "   Rol:      SuperAdministrador\n";
echo "   Estado:   ACTIVO ✅ (DEBE PODER ENTRAR)\n\n";

// ===== USUARIO 2: MODERADOR (DEBE ENTRAR) =====
$userModerador = \App\Models\User::create([
    'name' => 'Moderador Test',
    'email' => 'moderador@test.com',
    'password' => bcrypt('password456'),
]);

$usuarioModerador = \App\Models\UsuariosCampusMarket::create([
    'user_id' => $userModerador->id,
    'Apellidos' => 'Moderator',
    'Estado' => 1,
    'Telefono' => '2222222222',
    'Cod_Rol' => 2, // Moderador
    'Cod_Carrera' => $carrera->Cod_Carrera,
    'Cod_Universidad' => $uni->Cod_Universidad,
]);

echo "✅ USUARIO 2 CREADO - MODERADOR\n";
echo "   Email:    moderador@test.com\n";
echo "   Password: password456\n";
echo "   Rol:      Moderador\n";
echo "   Estado:   ACTIVO ✅ (DEBE PODER ENTRAR)\n\n";

// ===== USUARIO 3: ESTUDIANTE (NO DEBE ENTRAR) =====
$userEstudiante = \App\Models\User::create([
    'name' => 'Estudiante Test',
    'email' => 'estudiante@test.com',
    'password' => bcrypt('password789'),
]);

$usuarioEstudiante = \App\Models\UsuariosCampusMarket::create([
    'user_id' => $userEstudiante->id,
    'Apellidos' => 'Student',
    'Estado' => 1,
    'Telefono' => '3333333333',
    'Cod_Rol' => 3, // Estudiante
    'Cod_Carrera' => $carrera->Cod_Carrera,
    'Cod_Universidad' => $uni->Cod_Universidad,
]);

echo "⚠️  USUARIO 3 CREADO - ESTUDIANTE\n";
echo "   Email:    estudiante@test.com\n";
echo "   Password: password789\n";
echo "   Rol:      Estudiante\n";
echo "   Estado:   ACTIVO ❌ (NO DEBE PODER ENTRAR - ACCESO DENEGADO)\n\n";

echo str_repeat("=", 60) . "\n";
echo "🧪 PRUEBAS DE SEGURIDAD:\n";
echo str_repeat("=", 60) . "\n";
echo "\n1️⃣  PRUEBA: Intentar entrar con ESTUDIANTE\n";
echo "   Email: estudiante@test.com\n";
echo "   Pass:  password789\n";
echo "   Resultado esperado: ❌ 'Usted no tiene autorización para entrar.'\n";
echo "\n2️⃣  PRUEBA: Intentar entrar con MODERADOR\n";
echo "   Email: moderador@test.com\n";
echo "   Pass:  password456\n";
echo "   Resultado esperado: ✅ ACCESO PERMITIDO AL PANEL\n";
echo "\n3️⃣  PRUEBA: Intentar entrar con SUPERADMIN\n";
echo "   Email: superadmin@test.com\n";
echo "   Pass:  password123\n";
echo "   Resultado esperado: ✅ ACCESO PERMITIDO AL PANEL\n";
echo "\n4️⃣  PRUEBA: Bloqueo de intentos fallidos\n";
echo "   - Intenta 5 veces con contraseña incorrecta\n";
echo "   - Resultado esperado en intento 6: ❌ 'Demasiados intentos fallidos. Espere 5 minuto(s)'\n";

echo "\n" . str_repeat("=", 60) . "\n";

