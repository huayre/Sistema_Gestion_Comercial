<?php
namespace Modules\Compras\Service;
use Modules\Compras\Repository\ProveedorRepository;
use DataTables;

class ProveedorService
{
    private $ProveedorRepository;

    public function __construct(ProveedorRepository $ProveedorRepository){
        $this->ProveedorRepository=$ProveedorRepository;
    }

    public function ListaDepartamentos(){
       return $this->ProveedorRepository->alldepartamentos();
    }

    public function BuscarProvincias($id){
        return $this->ProveedorRepository->FindProvincias($id);
    }

    public function BuscarDistritos($id){
        return $this->ProveedorRepository->FindDistritos($id);
    }

    public function CrearProveedor($data){
        return $this->ProveedorRepository->create($data);
    }

    public function TablaProveedores(){
        $data = $this->ProveedorRepository->all();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {

                $btn = '<a  href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editar "><i class="fa fa-edit"></i>Editar</a>';

                $btn =$btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm eliminar "><i class="fa fa-trash"></i> Eliminar</a>';

                return '<div class="d-flex justify-content-around" style="width:170px">'.$btn.'</div>';
            })
            ->addColumn('departamento', function ($row) {
                return $row->Departamento->nombre;
            })
            ->rawColumns(['action','departamento'])
            ->make(true);
    }

    public function EliminarProveedor($id){
        return $this->ProveedorRepository->delete($id);
    }

    public function BuscarProveedor($id){
        return $this->ProveedorRepository->find($id);
    }

    public function EditarProveedor($data,$id){
        $this->ProveedorRepository->update($data,$id);
    }
}