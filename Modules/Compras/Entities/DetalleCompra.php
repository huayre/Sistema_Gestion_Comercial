<?php

namespace Modules\Compras\Entities;

use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{   
    protected $table='detalle_compras';
    protected $fillable = [
        'compra_id',
        'producto_id',
        'cantidad_compra',
        'precio_compra'
    ];

    public function Producto(){
        return $this->belongsTo(Producto::class);
    }
}
