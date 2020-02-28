<?php

namespace Modules\Almacen\Entities;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [];

    public function categoria(){
        return $this->belongsTo(categoria::class);
    }

    public function marca(){
        return $this->belongsTo(marca::class);
    }
}
