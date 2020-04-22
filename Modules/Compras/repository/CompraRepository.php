<?php
namespace Modules\Compras\Repository;

use Modules\Compras\Entities\Producto;
use Modules\Compras\Entities\Compra;
use Modules\Compras\Entities\DetalleCompra;

class CompraRepository{
    
    public function ListaProductos(){
        $ListaProductos=Producto::all();
        return $ListaProductos;
    }
     //Metodo que nos permite sacar el precio de compra
    public function PrecioTotalCompra($detalle_compra){
        $PrecioCompraTotal=0;
        foreach ($detalle_compra as $key => $value) {
            $value=(object)$detalle_compra[$key];
            $PrecioCompraTotal=$PrecioCompraTotal+($value->cantidad_compra_producto*$value->precio_producto_unidad);
        }
        return $PrecioCompraTotal;
    }
 
    //Metodo para registrar una compra y retornamos el id a la CompraService para ser enviado al detalle de compra (para relacionar la tabla)
    public function RegistrarCompraDatosGenerales($datos,$PrecioCompraTotal){
        
        $compra= Compra::create([
            'tipo_comprobante'=>$datos->tipo_comprobante,
            'serie_comprobante'=>$datos->serie_comprobante,
            'numero_comprobante'=>$datos->numero_comprobante,
            'fecha_compra'=>$datos->fecha_compra,
            'precio_compra'=>$PrecioCompraTotal,
            'proveedor_id'=>$datos->proveedor_id
        ]);
        return $compra->id;
        
        
    }

    public function RegistrarCompraDetalles($compra_id,$producto_id,$cantidad_compra,$precio_compra){
        $detalle_compra=new DetalleCompra;
        $detalle_compra->create([
            'compra_id'=>$compra_id,
            'producto_id'=>$producto_id,
            'cantidad_compra'=>$cantidad_compra,
            'precio_compra'=>$precio_compra
        ]);
    }

    
}
