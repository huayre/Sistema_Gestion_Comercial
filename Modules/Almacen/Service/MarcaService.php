<?php


namespace Modules\Almacen\Service;


use Modules\Almacen\Repository\MarcaRepository;
use DataTables;

class MarcaService
{
    private $MarcaRepository;
    public function __construct(MarcaRepository $MarcaRepository)
    {
        $this->MarcaRepository=$MarcaRepository;
    }

    public function TablaMarcas(){
        $data = $this->MarcaRepository->all();
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

    public function ListaMarcas($buscar){
        return  $this->MarcaRepository->all($buscar);

    }

    public function CrearMarca($data){
        $this->MarcaRepository->create($data);
    }

    public function ActualizarMarca($data,$id){
        $this->MarcaRepository->update($data,$id);
    }

    public function EliminarMarca($id){
        $this->MarcaRepository->delete($id);
    }

}
