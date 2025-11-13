<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class UsuariosCampusMarket extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios_campus_markets';

    protected $primaryKey = 'ID_Usuario';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'user_id',
        'Apellidos',
        'Genero',
        'Estado',
        'Telefono',
        'Foto_de_portada',
        'Foto_de_perfil',
        'Cod_Rol',
        'Cod_Carrera',
        'Cod_Universidad',
        'google_id',
    ];

    protected $hidden = [
        'Contrasena',
        'remember_token',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function setContrasenaAttribute($value)
    {
        if (empty($value)) {
            $this->attributes['Contrasena'] = null;

            return;
        }

        if (! password_get_info($value)['algo']) {
            $this->attributes['Contrasena'] = Hash::make($value);
        } else {
            $this->attributes['Contrasena'] = $value;
        }
    }

    public function getAuthPassword()
    {
        return $this->Contrasena;
    }

    public function rol()
    {
        return $this->belongsTo(Roles::class, 'Cod_Rol', 'Cod_Rol');
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'Cod_Carrera', 'Cod_Carrera');
    }

    public function universidad()
    {
        return $this->belongsTo(Universidades::class, 'Cod_Universidad', 'Cod_Universidad');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
