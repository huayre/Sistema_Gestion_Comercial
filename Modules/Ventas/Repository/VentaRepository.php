<?php

namespace Modules\Ventas\Repository;

use  Modules\Ventas\Entities\Cliente;
use  Modules\Ventas\Entities\Producto;
class VentaRepository{

    public function ListaProductos(){
       $ListaProductos=Producto::all();
       return $ListaProductos;
    }

}