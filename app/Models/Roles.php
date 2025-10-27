<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'Cod_Rol';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'Nombre_Rol',
        'Descripcion',
        'Foto_Rol',
    ];
}
