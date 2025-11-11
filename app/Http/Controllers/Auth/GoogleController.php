<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UsuariosCampusMarket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Buscar usuario en la tabla usuarios_campus_markets
            $findUser = UsuariosCampusMarket::where('Correo_Electronico', $user->email)->first();

            if ($findUser) {
                // Si existe, verificar si ya tiene google_id
                if (! $findUser->google_id) {
                    $findUser->update(['google_id' => $user->id]);
                }
                Auth::guard('web')->login($findUser);

                return redirect('/estudiantes');
            } else {
                // Crear nuevo usuario en usuarios_campus_markets
                $nameParts = explode(' ', $user->name, 2);
                $firstName = $nameParts[0] ?? '';
                $lastName = $nameParts[1] ?? '';

                $newUser = UsuariosCampusMarket::create([
                    'Nombres' => $firstName,
                    'Apellidos' => $lastName,
                    'Correo_Electronico' => $user->email,
                    'Contrasena' => Hash::make('123456dummy'),
                    'google_id' => $user->id,
                    'Cod_Rol' => 3, // Rol de estudiante por defecto
                    'Cod_Carrera' => 1, // Carrera por defecto (deberías ajustar esto)
                    'Cod_Universidad' => 1, // Universidad por defecto (deberías ajustar esto)
                    'Estado' => 'Habilitado',
                ]);

                Auth::guard('web')->login($newUser);

                return redirect('/estudiantes');
            }
        } catch (\Exception $e) {
            return redirect('/estudiantes/login')->with('error', 'Error al iniciar sesión con Google: '.$e->getMessage());
        }
    }
}
