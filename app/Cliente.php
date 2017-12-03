<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrdenCompra;

class Cliente extends Model
{
    protected $fillable = [
        'nombre', 'email', 'telefono', 'direccion', 'rfc'
    ];

    public function getRfcAttribute()
    {
        return strtoupper( $this->attributes['rfc'] );
    }

    public function setRfcAttribute($value)
    {
        $this->attributes['rfc'] = strtoupper($value);
    }

    public function ordenesCompra()
    {
        return $this->hasMany(OrdenCompra::class, 'cliente_id');
    }
}
