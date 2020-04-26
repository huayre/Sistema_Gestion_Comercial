<?php


namespace Modules\Almacen\Service;


use Modules\Almacen\Repository\CategoriaRepository;
use Modules\Almacen\Repository\MarcaRepository;
use Modules\Almacen\Repository\ProductoRepository;
use DataTables;
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
        $data = $this->ProductoRepository->all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editar"><i class="fa fa-edit"></i>Editar</a>';

                $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm eliminar"><i class="fa fa-trash"></i> Eliminar</a>';

                return '<div style="width:170px">'.$btn.'</div>';
            })
            ->addColumn('categoria',function($data){
                return $data->categoria->nombre;
            })
            ->addColumn('marca',function ($data){
                return $data->marca->nombre;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function ListaCategorias(){
        return $this->CategoriaRepository->all();
    }
    public function ListaMarcas(){
        return $this->MarcaRepository->all();
    }
    public function RegistrarProducto($datos){
        $this->ProductoRepository->create($datos);
    }


}
