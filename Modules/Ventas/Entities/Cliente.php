<?php

namespace Modules\Ventas\Entities;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nombres',
        'tipo_documento',
        'numero_documento',
        'direccion',
        'telefono',
        'email'
    ];
}
