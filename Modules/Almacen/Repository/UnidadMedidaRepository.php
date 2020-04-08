<?php


namespace Modules\Almacen\Repository;

use Modules\Almacen\Entities\Medida;

class UnidadMedidaRepository implements Base
{

    public function all()
    {
        // TODO: Implement all() method.
        $ListaMarcas=Medida::latest()->get();
        return $ListaMarcas;
    }

    public function create($data)
    {
        // TODO: Implement create() method.
        $marca=new Medida();
        $marca->create($data->all());
    }

    public function update($data,$marca)
    {
        // TODO: Implement update() method.
       // $marca=Marca::find($id);
        $marca->update($data->all());
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $marca=Medida::find($id);
        $marca->delete();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
      return  $medida=Medida::find($id);
    }
   
}
