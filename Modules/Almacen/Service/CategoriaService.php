<?php


namespace Modules\Almacen\Service;


use Modules\Almacen\Entities\Categoria;
use Modules\Almacen\Repository\CategoriaRepository;
use DataTables;
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

  public function TablaCategorias(){
      $data = $this->CategoriaRepository->all();
      return Datatables::of($data)
          ->addIndexColumn()
          ->addColumn('action', function ($row) {

              $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editar"><i class="fa fa-edit"></i>Editar</a>';

              $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm eliminar"><i class="fa fa-trash"></i> Eliminar</a>';

              return $btn;
          })
          ->rawColumns(['action'])
          ->make(true);
  }

  public function BuscarCategoria($id){
     return $this->CategoriaRepository->find($id);
  }


}
