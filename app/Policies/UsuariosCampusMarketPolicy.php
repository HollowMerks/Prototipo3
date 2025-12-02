<?php

namespace App\Policies;

use App\Models\User;
use App\Models\UsuariosCampusMarket;
use Illuminate\Auth\Access\Response;

class UsuariosCampusMarketPolicy
{
    /**
     * Determinar si el usuario puede ver la lista de usuarios
     */
    public function viewAny(User $user): bool
    {
        return $this->isSuperAdmin($user);
    }

    /**
     * Determinar si el usuario puede ver un usuario específico
     */
    public function view(User $user, UsuariosCampusMarket $usuariosCampusMarket): bool
    {
        return $this->isSuperAdmin($user);
    }

    /**
     * Determinar si el usuario puede crear un usuario
     */
    public function create(User $user): bool
    {
        return $this->isSuperAdmin($user);
    }

    /**
     * Determinar si el usuario puede actualizar un usuario
     */
    public function update(User $user, UsuariosCampusMarket $usuariosCampusMarket): bool
    {
        return $this->isSuperAdmin($user);
    }

    /**
     * Determinar si el usuario puede eliminar un usuario
     */
    public function delete(User $user, UsuariosCampusMarket $usuariosCampusMarket): bool
    {
        return $this->isSuperAdmin($user);
    }

    /**
     * Determinar si el usuario puede restaurar un usuario eliminado
     */
    public function restore(User $user, UsuariosCampusMarket $usuariosCampusMarket): bool
    {
        return $this->isSuperAdmin($user);
    }

    /**
     * Determinar si el usuario puede eliminar permanentemente un usuario
     */
    public function forceDelete(User $user, UsuariosCampusMarket $usuariosCampusMarket): bool
    {
        return $this->isSuperAdmin($user);
    }

    /**
     * Helper: verificar si el usuario autenticado es SuperAdministrador
     */
    private function isSuperAdmin(User $user): bool
    {
        $usuarioCampus = UsuariosCampusMarket::where('user_id', $user->id)->first();

        if (!$usuarioCampus) {
            return false;
        }

        $rol = $usuarioCampus->rol;

        return $rol && strtolower($rol->Nombre_Rol) === 'superadministrador';
    }
}
