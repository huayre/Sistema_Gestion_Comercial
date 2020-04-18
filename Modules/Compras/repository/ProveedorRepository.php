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
        $departamento=new Proveedor();
        $departamento->create($data->all());
    }

    public function update($data, $id)
    {
        // TODO: Implement update() method.
       $departamento=Departamento::find($id);
       $departamento->update($data->all());
    }

    public function delete($id)
    {
        $proveedor=Proveedor::find($id);
        $proveedor->delete();
    }

    public function find($id)
    {
        // TODO: Implement find() method.
        $Proveedor=Proveedor::find($id);
        return $Proveedor;
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
    
