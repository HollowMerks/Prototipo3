<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin_notificaciones extends Model
{
    protected $table = 'admin_notificaciones';

    protected $primaryKey = 'ID_Notificacion';

    protected $fillable = [
        'ID_Usuario',
        'Titulo_Notificacion',
        'Mensaje_Notificacion',
        'imgen',
        'Estado_Notificacion',
        'Fecha_Envio',
    ];

    protected $casts = [
        'Fecha_Envio' => 'datetime',
        'Estado_Notificacion' => 'string',
    ];

    public function usuario()
    {
        return $this->belongsTo(UsuariosCampusMarket::class, 'ID_Usuario', 'ID_Usuario');
    }
}
