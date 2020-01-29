<?php


namespace Modules\Almacen\Repository;


interface Base
{
    public function all();

    public function create($data);

    public function update($data, $id);

    public function delete($id);

    public function find($id);

}
