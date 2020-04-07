<?php

namespace Modules\Ventas\Entities;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
     'nombre',
     'codigo_barra',
     'precio_venta_unidad',
     'precio_compra',
     'stock',
     'alerta_minima',
     'categoria_id',
     'marca_id'
    ];
}
