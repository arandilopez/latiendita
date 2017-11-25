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

    protected $fillable = [
        'iva', 'total', 'subtotal', 'descuento'
    ];

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
