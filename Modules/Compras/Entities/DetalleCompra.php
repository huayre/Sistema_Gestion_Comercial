<?php

namespace Modules\Compras\Entities;

use Illuminate\Database\Eloquent\Model;

class Detalle_Compra extends Model
{   
    protected $table='detalle_compra';
    protected $fillable = [
        'compra_id',
        'producto_id',
        'cantidad_compra',
        'precio_compra'
    ];
}
