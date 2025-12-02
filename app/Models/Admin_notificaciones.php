<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin_notificaciones extends Model
{
    use SoftDeletes;
    protected $table = 'admin_notificaciones';

    protected $primaryKey = 'ID_Notificacion';

    protected $fillable = [
        'ID_Usuario',
        'tipo_envio',
        'Cod_Rol',
        'Destinatario_Notificacion',
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

    public function rol()
    {
        return $this->belongsTo(Roles::class, 'Cod_Rol', 'Cod_Rol');
    }
}
