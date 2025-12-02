<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HandleLivewireGetRequests
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Si es un GET a livewire/update, redirigir al login
        if ($request->method() === 'GET' && str_contains($request->path(), 'livewire/update')) {
            return redirect('/login');
        }

        return $next($request);
    }
}
