<?php
namespace Modules\Ventas\Service;
use Modules\Ventas\Repository\VentaRepository;
use Modules\Ventas\Repository\ClienteRepository;

class VentaService{

    private $VentaRepository;
    private $ClienteRepository;
    public function __construct(VentaRepository $VentaRepository,ClienteRepository $ClienteRepository){
        $this->VentaRepository=$VentaRepository;
        $this->ClienteRepository=$ClienteRepository;
    }

    public function ListaProductos(){
        return $this->VentaRepository->ListaProductos();
    }

    public function ListaClientes(){
        return $this->ClienteRepository->all();
    }

   
}
