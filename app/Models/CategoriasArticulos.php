<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriasArticulos extends Model
{
    protected $table = 'categorias_articulos';

    protected $primaryKey = 'Cod_Categoria';

    protected $fillable = [
        'Nombre_Categoria',
        'Descripcion_Categoria',
        'Cod_Carrera',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'Cod_Carrera', 'Cod_Carrera');
    }

    public function publicaciones()
    {
        return $this->hasMany(Publicaciones::class, 'Cod_Categoria', 'Cod_Categoria');
    }
}
