<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReputacionEntreUsuarios extends Model
{
    use HasFactory;

    protected $table = 'reputacion_entre_usuarios';

    protected $primaryKey = 'ID_Reputacion';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'ID_Usuario_Calificador',
        'ID_Usuario_Calificado',
        'Puntuacion',
        'Comentario',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function calificador()
    {
        return $this->belongsTo(UsuariosCampusMarket::class, 'ID_Usuario_Calificador', 'ID_Usuario');
    }

    public function calificado()
    {
        return $this->belongsTo(UsuariosCampusMarket::class, 'ID_Usuario_Calificado', 'ID_Usuario');
    }
}
