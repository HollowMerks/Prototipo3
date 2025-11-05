<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    protected $table = 'publicaciones';

    protected $fillable = [
        'Titulo_Publicacion',
        'Descripcion_Publicacion',
        'Estado_Publicacion',
        'Precio_Publicacion',
        'Imagen_Publicacion',
        'Cod_Categoria',
        'ID_Vendedor',
    ];

    protected $casts = [
        'Estado_Publicacion' => 'boolean',
        'Precio_Publicacion' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function categoria()
    {
        return $this->belongsTo(CategoriasArticulos::class, 'Cod_Categoria', 'Cod_Categoria');
    }

    public function vendedor()
    {
        return $this->belongsTo(UsuariosCampusMarket::class, 'ID_Vendedor', 'ID_Usuario');
    }
}
