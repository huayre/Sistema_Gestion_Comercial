<?php


namespace Modules\Almacen\Repository;


use Modules\Almacen\Entities\Producto;

class ProductoRepository implements Base
{

    public function all()
    {
        // TODO: Implement all() method.
        $ListaProductos=Producto::paginate(10);
        return $ListaProductos;
    }

    public function create($data)
    {
        // TODO: Implement create() method.
        $producto=new Producto();
        $producto->create($data->all());

    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }
}
