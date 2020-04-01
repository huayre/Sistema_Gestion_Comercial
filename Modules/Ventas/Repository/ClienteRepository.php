<?php
namespace Modules\Ventas\Repository;
use  Modules\Ventas\Entities\Cliente;

class ClienteRepository implements BaseRepository
{
    //metodo para traes todas los clientes de la BD
    public function all()
    {
        // TODO: Implement all() method.
        $ListaCliente=Cliente::latest()->get();
        return $ListaCliente;
    }

    public function create($data)
    {
        // TODO: Implement create() method.
        $cliente=new Cliente();
        $cliente->create($data->all());
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

}