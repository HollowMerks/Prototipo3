<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\SecureAuthenticationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected $authService;

    public function __construct(SecureAuthenticationService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Mostrar el formulario de login
     */
    public function showLoginForm()
    {
        // Si ya está autenticado, redirigir al panel
        if (auth()->check()) {
            return redirect('/campusMarketAdministracion');
        }

        return view('auth.login');
    }

    /**
     * Procesar el login con validaciones de seguridad
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ], [
            'email.required' => 'El email es requerido.',
            'email.email' => 'El email debe ser válido.',
            'password.required' => 'La contraseña es requerida.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        ]);

        // Usar el servicio de autenticación segura
        $result = $this->authService->authenticate($request->email, $request->password);

        if ($result['success']) {
            // Login exitoso - autenticar al usuario
            Auth::login($result['user']);

            // Limpiar la sesión anterior
            $request->session()->regenerate();

            // Redirigir al panel administrativo
            return redirect('/campusMarketAdministracion')->with('success', 'Bienvenido al sistema administrativo.');
        }

        // Login fallido - retornar con mensaje de error
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['error' => $result['message']])
            ->with('blocked', $result['blocked'] ?? false);
    }

    /**
     * Logout del usuario
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Has cerrado sesión correctamente.');
    }
}
