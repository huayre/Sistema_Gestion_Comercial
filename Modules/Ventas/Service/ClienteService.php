<?php


namespace Modules\Ventas\Service;


use Modules\Ventas\Repository\ClienteRepository;
use DataTables;
class ClienteService
{
    private $ClienteRepository;
  public function __construct(ClienteRepository $ClienteRepository)
  {
      $this->ClienteRepository=$ClienteRepository;
  }

  public function ListaClientes(){
      return $this->ClienteRepository->all();
  }

  public function TablaClientes(){
    $data = $this->ClienteRepository->all();
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

  public function RegistrarCliente($datos){
      $this->ClienteRepository->create($datos);
  }
  
}