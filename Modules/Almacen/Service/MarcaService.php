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
    public function TablaMarcas1(){
      return  $this->MarcaRepository->all();
    }
    public function TablaMarcas(){
        $data = $this->MarcaRepository->all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm editar"><i class="fa fa-edit"></i>Editar</a>';

                $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm eliminar"><i class="fa fa-trash"></i> Eliminar</a>';

                return '<div  style="width:170px">'.$btn.'</div>';
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

    public function EliminarMarca($id){
        $this->MarcaRepository->delete($id);
    }
    
    public function BuscarMarca($id){
        return $this->MarcaRepository->find($id);
    }

   public function ActualizarMarca($data,$id){
        $marca=$this->MarcaRepository->find($id);
        $this->MarcaRepository->update($data,$marca);
   }
}
