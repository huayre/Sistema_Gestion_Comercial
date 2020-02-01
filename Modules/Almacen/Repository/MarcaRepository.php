<?php


namespace Modules\Almacen\Repository;

use Modules\Almacen\Entities\Marca;
class MarcaRepository implements Base
{

    public function all()
    {
        // TODO: Implement all() method.
        $ListaMarcas=Marca::latest()->get();
        return $ListaMarcas;
    }

    public function create($data)
    {
        // TODO: Implement create() method.
        $marca=new Marca();
        $marca->create($data->all());
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
        $marca=Marca::find($id);
        $marca->update($data->all());
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $marca=Marca::find($id);
        $marca->delete();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }
    //metodos adicionales
    public  function MarcasActivos(){
        return $marca=Marca::where('estado','=','Activo')->get();
    }
}
