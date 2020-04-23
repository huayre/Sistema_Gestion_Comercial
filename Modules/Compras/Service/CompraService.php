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
        //Extraemos los  array de los detalles de venta enviado desde AJAX
        $ArrayIdProducto=$datos->ArrayIdProducto;
        $ArrayCantidadCompraProducto=$datos->ArrayCantidadCompraProducto;
        $ArrayPrecioProductoUnidad=$datos->ArrayPrecioProductoUnidad;
     
            
        //extraemos el precio de venta del repositorio
        $PrecioCompraTotal=$this->CompraRepository->PrecioTotalCompra($ArrayCantidadCompraProducto,$ArrayPrecioProductoUnidad);
        //Registramos la compra con los datos generales y extraemos el id de la compra que servira para llenar el detalle de la compra
        $compra_id= $this->CompraRepository->RegistrarCompraDatosGenerales($datos,$PrecioCompraTotal);

       
       //while que permite registrar los detalles de la venta               
       $contador=0;
        while($contador<count($ArrayIdProducto)){
            //llamamos a metode para llenar los detalles de la compra pasando el id d ela compra    
            $this->CompraRepository->RegistrarCompraDetalles($compra_id,$ArrayIdProducto[$contador],$ArrayCantidadCompraProducto[$contador],$ArrayPrecioProductoUnidad[$contador]);
            //Funcion que permite actualizar el stock de los productos 
            $this->CompraRepository->ActualizarStockDisminuir($ArrayIdProducto[$contador],$ArrayCantidadCompraProducto[$contador]);
            $contador++;
        }

     
       
        
        
    }

}
