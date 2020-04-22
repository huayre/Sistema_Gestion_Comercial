<?php
namespace Modules\Compras\Service;
use Modules\Compras\Repository\ProveedorRepository;
use Modules\Compras\Repository\CompraRepository;

class CompraService{
    private $ProveedorRepository;
    private $CompraRepository;
    public function __construct(ProveedorRepository $ProveedorRepository,CompraRepository $CompraRepository){
        $this->ProveedorRepository=$ProveedorRepository;
        $this->CompraRepository=$CompraRepository;
    }

    public function ListaProveedor(){
        return $this->ProveedorRepository->all();
    }
    public function ListaProductos(){
        return $this->CompraRepository->ListaProductos();
    }

    public function CrearNuevaCompra($datos){
        //Extraemos el array de los detalles de venta enviado desde AJAX
        $detalle_compra=$datos->array_detalle_compra;
        //extraemos el precio de venta del repositorio
        $PrecioCompraTotal=$this->CompraRepository->PrecioTotalCompra($detalle_compra);
        //Registramos la compra con los datos generales y extraemos el id de la compra que servira para llenar el detalle de la compra
        $compra_id= $this->CompraRepository->RegistrarCompraDatosGenerales($datos,$PrecioCompraTotal);

       
       //Foreach que permite registrar los detalles de la venta
       foreach ($detalle_compra as $key => $value) {
              //convertimos el array string en objeto
              $value=(object)$detalle_compra[$key];
              //llamamos a metode para llenar los detalles de la compra pasando el id d ela compra            
             $this->CompraRepository->RegistrarCompraDetalles($compra_id,$value->producto_id,$value->cantidad_compra_producto,$value->precio_producto_unidad);
          
       }
       
        
        
    }

}
