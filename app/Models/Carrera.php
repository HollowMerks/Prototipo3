<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carrera extends Model
{
    protected $table = 'carreras';

    protected $primaryKey = 'Cod_Carrera';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'Nombre_Carrera',
        'Cod_Universidad',
        'Foto_Carrera',
        'Descripcion_Carrera',
        'Duracion_Carrera',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function universidad(): BelongsTo
    {
        return $this->belongsTo(Universidades::class, 'Cod_Universidad', 'Cod_Universidad');
    }
}
