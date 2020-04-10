<?php
namespace Modules\Compras\Service;
use Modules\Compras\Repository\ProveedorRepository;
class ProveedorService{
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


}