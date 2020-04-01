<?php


namespace Modules\Compras\Repository;


use Modules\Compras\Entities\Proveedor;

class ProveedorRepository implements Base
{
    //metodo para traes todas los proveedores de la BD
    public function all()
    {
        // TODO: Implement all() method.
        $ListaProveedor=Proveedor::latest()->get();
        return $ListaProveedor;
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
    }

    //Metodos Adicionales
    public function CategoriasActivos(){
        return $categoria=Categoria::where('estado','=','Activo')->get();
    }
}
