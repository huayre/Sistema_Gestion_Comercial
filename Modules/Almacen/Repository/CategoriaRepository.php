<?php


namespace Modules\Almacen\Repository;


use Modules\Almacen\Entities\Categoria;

class CategoriaRepository implements Base
{
    //metodo para traes todas las categorias de la BD
    public function all()
    {
        // TODO: Implement all() method.
        $ListaCategorias=Categoria::latest()->get();
        return $ListaCategorias;
    }

    public function create($data)
    {
        // TODO: Implement create() method.
        $Categoria=new Categoria();
        $Categoria->create($data->all());
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.

       $categoria=Categoria::find($id);
       $categoria->update($data->all());
    }

    public function delete($id)
    {
        $categoria=Categoria::find($id);
        $categoria->delete();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        $categoria=Categoria::find($id);
        return $categoria;
    }

    
}
