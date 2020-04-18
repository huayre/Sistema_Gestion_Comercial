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
        $this->CompraRepository->RegistrarCompra($datos);
    }
}
