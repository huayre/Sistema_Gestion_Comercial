<?php

namespace Modules\Almacen\Entities;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
}
