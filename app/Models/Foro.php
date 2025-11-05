<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foro extends Model
{
    use HasFactory;

    protected $table = 'foros';

    protected $primaryKey = 'ID_Foro';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'Titulo_Foro',
        'Descripcion_Foro',
        'ID_Creador',
        'Estado_Foro',
        'Imagen_Foro',
    ];

    protected $casts = [
        'Estado_Foro' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function creador()
    {
        return $this->belongsTo(UsuariosCampusMarket::class, 'ID_Creador', 'ID_Usuario');
    }
}
