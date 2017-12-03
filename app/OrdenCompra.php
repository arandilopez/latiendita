<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;
use App\User;
use App\Producto;

class OrdenCompra extends Model
{
    // Laravel intenta adivinar el nombre como: orden_compras
    protected $table = 'ordenes_compra';
    // public $timestamps = false;

    protected $fillable = [
        'iva', 'total', 'subtotal', 'descuento'
    ];

    public function scopeDeducibles($query)
    {
        return $query->where('total', '>', 200);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'orden_compra_producto', 'orden_compra_id', 'producto_id')->withPivot([
            'unidades', 'importe', 'precio_unitario', 'descripcion'
        ])->withTimestamps()->as('movimiento');
    }
}
