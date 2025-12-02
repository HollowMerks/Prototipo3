<?php

namespace App\Services;

use App\Models\User;
use App\Models\UsuariosCampusMarket;
use App\Models\LoginAttempt;
use App\Models\Roles;
use Illuminate\Support\Facades\Hash;

class SecureAuthenticationService
{
    const ALLOWED_ROLES = ['superadministrador', 'moderador'];
    // Valores que consideramos "activos" en la columna Estado (case-insensitive)
    const ACTIVE_STATES = ['activo', 'habilitado', 'enabled', '1', 'true', 'si'];
    // Valores que consideramos "inactivos" o bloqueados
    const INACTIVE_STATES = ['inactivo', 'inhabilitado', 'baneado', 'suspendido', 'inactive', 'disabled', '0', 'false', 'inactiv'];

    /**
     * Autenticar usuario con todas las validaciones de seguridad
     */
    public function authenticate($email, $password)
    {
        // 1. Verificar si el email está bloqueado por intentos fallidos
        if (LoginAttempt::isBlocked($email)) {
            $remaining = LoginAttempt::getBlockedTimeRemaining($email);
            return [
                'success' => false,
                'message' => 'Demasiados intentos fallidos. Espere ' . ceil($remaining / 60) . ' minuto(s) para volver a intentar.',
                'blocked' => true,
            ];
        }

        // 2. Validar email y contraseña contra tabla users
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            LoginAttempt::recordFailedAttempt($email);
            return [
                'success' => false,
                'message' => 'El email o contraseña son incorrectos.',
                'blocked' => false,
            ];
        }

        // 3. Validar que exista registro en usuarios_campusmarket
        $usuarioCampusMarket = UsuariosCampusMarket::where('user_id', $user->id)->first();

        if (!$usuarioCampusMarket) {
            LoginAttempt::recordFailedAttempt($email);
            return [
                'success' => false,
                'message' => 'No existe registro de usuario en el sistema CampusMarket.',
                'blocked' => false,
            ];
        }

        // 4. Validar que la cuenta esté activa
        $estadoRaw = $usuarioCampusMarket->Estado;
        $estadoNormalized = strtolower(trim((string) $estadoRaw));

        if (!in_array($estadoNormalized, self::ACTIVE_STATES, true)) {
            LoginAttempt::recordFailedAttempt($email);
            return [
                'success' => false,
                'message' => 'Su cuenta está inactiva. Comuníquese con el administrador.',
                'blocked' => false,
            ];
        }

        // 5. Validar que el rol sea superadministrador o moderador
        $rol = Roles::find($usuarioCampusMarket->Cod_Rol);

        if (!$rol || !in_array(strtolower($rol->Nombre_Rol), self::ALLOWED_ROLES)) {
            LoginAttempt::recordFailedAttempt($email);
            return [
                'success' => false,
                'message' => 'Usted no tiene autorización para entrar.',
                'blocked' => false,
            ];
        }

        // 6. Todo es correcto - limpiar intentos y retornar éxito
        LoginAttempt::clearAttempts($email);

        return [
            'success' => true,
            'message' => 'Autenticación exitosa.',
            'user' => $user,
            'usuario_campus' => $usuarioCampusMarket,
            'rol' => $rol,
        ];
    }

    /**
     * Verificar si un usuario tiene acceso al panel administrativo
     */
    public function hasAdminAccess($user)
    {
        // Verificar que existe en usuarios_campusmarket
        $usuarioCampusMarket = UsuariosCampusMarket::where('user_id', $user->id)->first();

        if (!$usuarioCampusMarket) {
            return false;
        }

        // Verificar que esté activo (aceptar sinónimos como 'Habilitado')
        $estadoRaw = $usuarioCampusMarket->Estado;
        $estadoNormalized = strtolower(trim((string) $estadoRaw));
        if (!in_array($estadoNormalized, self::ACTIVE_STATES, true)) {
            return false;
        }

        // Verificar que el rol sea válido
        $rol = Roles::find($usuarioCampusMarket->Cod_Rol);

        if (!$rol || !in_array(strtolower($rol->Nombre_Rol), self::ALLOWED_ROLES)) {
            return false;
        }

        return true;
    }
}
