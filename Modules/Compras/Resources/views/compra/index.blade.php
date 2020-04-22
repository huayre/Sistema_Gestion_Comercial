@extends('plantillas.AdminLTE_3_0_1.base')
@section('contenido')
       
    <h2 class="row justify-content-center text-primary text-center">LISTA DE PROVEEDORES</h2>
    
    <h3>
        <a href="{{route('compra.create')}}"  class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> NUEVA COMPRA
        </a>
    </h3>
    
  <div class="table-responsive">
    <table class="table table-hover w-100 " id="tabla_proveedores" >
        <thead class="bg-primary">
        <tr>
            <th>N°</th>            
            <th>Nombre</th>
            <th>Tipo de documento</th>
            <th>Número de documento</th>
            <th>Departamento</th>
            <th>Provincia</th>
            <th>Distrito</th>           
            <th>Celular</th>
            <th>Email</th>
            <th>Opciones</th>
            
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
  </div>
@endsection
