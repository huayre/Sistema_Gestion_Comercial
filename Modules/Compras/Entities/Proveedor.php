<?php

namespace Modules\Compras\Entities;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{  
    protected $table="proveedores";
    
    protected $fillable = [
        'nombre_empresa',
        'direccion',
        'tipo_documento',
        'numero_documento',
        'telefono',
        'email',
        'ubicacion_departamento',
        'ubicacion_provincia',
        'ubicacion_distrito'
    ];
}
