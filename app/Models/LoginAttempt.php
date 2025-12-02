<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class LoginAttempt extends Model
{
    protected $fillable = [
        'email',
        'attempts',
        'last_attempt',
        'blocked_until',
    ];

    protected $casts = [
        'last_attempt' => 'datetime',
        'blocked_until' => 'datetime',
    ];

    /**
     * Registrar un intento fallido
     */
    public static function recordFailedAttempt($email)
    {
        $attempt = self::firstOrCreate(['email' => $email]);
        $attempt->attempts += 1;
        $attempt->last_attempt = Carbon::now();

        // Bloquear después de 5 intentos
        if ($attempt->attempts >= 5) {
            $attempt->blocked_until = Carbon::now()->addMinutes(5);
            \Log::info("Email $email bloqueado hasta " . $attempt->blocked_until);
        }

        $attempt->save();
        \Log::info("Intento registrado para $email. Intentos: " . $attempt->attempts);
        return $attempt;
    }

    /**
     * Verificar si el email está bloqueado
     */
    public static function isBlocked($email)
    {
        $attempt = self::where('email', $email)->first();

        if (!$attempt) {
            return false;
        }

        // Verificar si hay bloqueo vigente
        if ($attempt->blocked_until && Carbon::now()->lessThan($attempt->blocked_until)) {
            \Log::warning("Email $email bloqueado. Tiempo restante: " . Carbon::now()->diffInSeconds($attempt->blocked_until));
            return true;
        }

        // Si pasó el bloqueo, reiniciar intentos
        if ($attempt->blocked_until && Carbon::now()->greaterThanOrEqualTo($attempt->blocked_until)) {
            $attempt->attempts = 0;
            $attempt->blocked_until = null;
            $attempt->save();
            \Log::info("Bloqueo de $email expirado, intentos reiniciados");
        }

        return false;
    }

    /**
     * Limpiar intentos después de login exitoso
     */
    public static function clearAttempts($email)
    {
        $attempt = self::where('email', $email)->first();
        if ($attempt) {
            $attempt->attempts = 0;
            $attempt->blocked_until = null;
            $attempt->save();
        }
    }

    /**
     * Obtener tiempo restante de bloqueo en segundos
     */
    public static function getBlockedTimeRemaining($email)
    {
        $attempt = self::where('email', $email)->first();

        if (!$attempt || !$attempt->blocked_until) {
            return 0;
        }

        $remaining = Carbon::now()->diffInSeconds($attempt->blocked_until, false);
        return max(0, $remaining);
    }
}
