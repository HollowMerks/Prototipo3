<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\SecureAuthenticationService;

class CheckAdminAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // Si no está autenticado, Filament lo maneja
        if (!$user) {
            return $next($request);
        }

        // Verificar acceso administrativo
        $authService = new SecureAuthenticationService();

        if (!$authService->hasAdminAccess($user)) {
            // Si no tiene acceso, desloguear y redirigir
            auth()->logout();
            $request->session()->invalidate();
            return redirect('/login')->with('error', 'Usted no tiene autorización para entrar al panel administrativo.');
        }

        return $next($request);
    }
}
