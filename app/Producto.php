<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrdenCompra;

class Producto extends Model
{
    protected $fillable = [
        'nombre', 'precio', 'descripcion'
    ];

    // protected $guarded = [];

    public function ordenesCompra()
    {
        return $this->belongsToMany(OrdenCompra::class, 'orden_compra_producto', 'orden_compra_id', 'producto_id')->withPivot([
            'unidades', 'precio_unitario', 'importe', 'descripcion'
        ])->withTimestamps()->as('movimiento');
    }
}
