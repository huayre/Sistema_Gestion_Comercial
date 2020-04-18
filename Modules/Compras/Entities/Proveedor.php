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

    //funciones para las reaciones de las tablas
    public function Departamento(){        
        return $this->belongsTo(Departamento::class,'ubicacion_departamento');        
    }
    public function Provincia(){        
        return $this->belongsTo(Provincia::class);        
    }
    public function Distrito(){        
        return $this->belongsTo(Distrito::class);        
    }
}
