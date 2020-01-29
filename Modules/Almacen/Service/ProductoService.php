<?php


namespace Modules\Almacen\Service;


use Modules\Almacen\Repository\CategoriaRepository;
use Modules\Almacen\Repository\MarcaRepository;
use Modules\Almacen\Repository\ProductoRepository;

class ProductoService
{
    private $ProductoRepository;
    private $CategoriaRepository;
    private $MarcaRepository;
    public function __construct(ProductoRepository $ProductoRepository,CategoriaRepository $CategoriaRepository,MarcaRepository $MarcaRepository)
    {
        $this->ProductoRepository=$ProductoRepository;
        $this->CategoriaRepository=$CategoriaRepository;
        $this->MarcaRepository=$MarcaRepository;
    }

    public function ListaProductos(){
        return $this->ProductoRepository->all();
    }
    public function ListaCategorias(){
        return $this->CategoriaRepository->CategoriasActivos();
    }
    public function ListaMarcas(){
        return $this->MarcaRepository->MarcasActivos();
    }
    public function RegistraProducto($datos){
        return $this->ProductoRepository->create($datos);
    }


}
