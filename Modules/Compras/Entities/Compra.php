<?php

namespace Modules\Compras\Entities;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $fillable = [
        'tipo_comprobante',
        'serie_comprobante',
        'numero_comprobante',
        'fecha_compra',
        'precio_compra',
        'proveedor_id'

    ];

    public function Proveedor(){
        return $this->belongsTo(Proveedor::class);
    }
}
