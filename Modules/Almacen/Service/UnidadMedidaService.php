<?php


namespace Modules\Almacen\Service;


use Modules\Almacen\Repository\UnidadMedidaRepository;
use DataTables;

class UnidadMedidaService
{
    private $UnidadMedidaRepository;
    public function __construct(UnidadMedidaRepository $UnidadMedidaRepository)
    {
        $this->UnidadMedidaRepository=$UnidadMedidaRepository;
    }

    public function TablaUnidadDeMedida(){
        $data = $this->UnidadMedidaRepository->all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-info btn-sm editar"><i class="fa fa-edit"></i>Editar</a>';

                $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm eliminar"><i class="fa fa-trash"></i> Eliminar</a>';

                return '<div style="width:170px">'.$btn.'</div>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    

    public function CrearUnidadMedida($data){
        $this->UnidadMedidaRepository->create($data);
    }  

    public function EliminarUnidadMedida($id){
        $this->UnidadMedidaRepository->delete($id);
    }
    
    public function BuscarUnidadMedida($id){
        return $this->UnidadMedidaRepository->find($id);
    }

   public function ActualizarUnidadMedida($data,$id){
        $marca=$this->UnidadMedidaRepository->find($id);
        $this->UnidadMedidaRepository->update($data,$marca);
   }
}
