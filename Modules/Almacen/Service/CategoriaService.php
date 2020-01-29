<?php


namespace Modules\Almacen\Service;


use Modules\Almacen\Repository\CategoriaRepository;

class CategoriaService
{
    private $CategoriaRepository;
  public function __construct(CategoriaRepository $categoriaRepository)
  {
      $this->CategoriaRepository=$categoriaRepository;
  }

  public function ListaCategorias(){
      return $this->CategoriaRepository->all();
  }

  public function CrearCategoria($datos){
      $this->CategoriaRepository->create($datos);
  }

  public function EliminarProducto($id){
      $this->CategoriaRepository->delete($id);
  }
  public function ActualizarCategoria($data,$id){
      $this->CategoriaRepository->update($data,$id);
  }
}
