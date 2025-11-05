<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaEntreUsuarios extends Model
{
    use HasFactory;

    protected $table = 'ventas_entre_usuarios';

    protected $primaryKey = 'ID_Venta';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'ID_Vendedor',
        'ID_Comprador',
        'Articulo_ID',
        'Precio_Venta',
        'Fecha_Venta',
    ];

    protected $casts = [
        'Precio_Venta' => 'decimal:2',
        'Fecha_Venta' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function vendedor()
    {
        return $this->belongsTo(UsuariosCampusMarket::class, 'ID_Vendedor', 'ID_Usuario');
    }

    public function comprador()
    {
        return $this->belongsTo(UsuariosCampusMarket::class, 'ID_Comprador', 'ID_Usuario');
    }

    public function articulo()
    {
        return $this->belongsTo(ArticuloVenta::class, 'Articulo_ID', 'id');
    }
}
