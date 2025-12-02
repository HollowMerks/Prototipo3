<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Universidades extends Model
{
    use SoftDeletes;

    protected $table = 'universidades';

    protected $primaryKey = 'Cod_Universidad';

    protected $fillable = [
        'Nombre_Universidad',
        'Correo_Universidad',
        'Telefono_Universidad',
        'Direccion_Universidad',
        'Universisdad_foto_de_portada',
        'Universisdad_foto_de_perfil',
        'Sitio_Web',
        'Descripcion',
        'Hora_apertura',
        'Hora_cierre',
    ];

    protected $casts = [
        'Hora_apertura' => 'datetime:H:i:s',
        'Hora_cierre' => 'datetime:H:i:s',
    ];
}
