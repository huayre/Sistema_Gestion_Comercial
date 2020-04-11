<?php

namespace Modules\Compras\Repository;


use Modules\Compras\Entities\Proveedor;
use Modules\Compras\Entities\Departamento;
use Modules\Compras\Entities\Provincia;
use Modules\Compras\Entities\Distrito;

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
        $Categoria=new Proveedor();
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

    public function alldepartamentos(){
        $ListaDepartamentos=Departamento::all();
        return $ListaDepartamentos;
    }

    public function FindProvincias($id){
        
        $ListaProvincias=Provincia::where('departamento_id',$id)->get();
        return $ListaProvincias;
    }

    public function FindDistritos($id){
        $ListaDistritos=Distrito::where('provincia_id',$id)->get();
        return $ListaDistritos;
    }

}
    
