<?php


namespace Modules\Almacen\Service;


use Modules\Almacen\Repository\MarcaRepository;

class MarcaService
{
    private $MarcaRepository;
    public function __construct(MarcaRepository $MarcaRepository)
    {
        $this->MarcaRepository=$MarcaRepository;
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
