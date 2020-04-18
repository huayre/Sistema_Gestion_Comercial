<?php
namespace Modules\Compras\Repository;

use Modules\Compras\Entities\Producto;
use Modules\Compras\Entities\Compra;

class CompraRepository{
    
    public function ListaProductos(){
        $ListaProductos=Producto::all();
        return $ListaProductos;
    }

    public function RegistrarCompra($datos){
        $compra=new Compra();
        $compra->create($datos->all());
    }
    public function 
}
