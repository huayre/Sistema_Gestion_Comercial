@extends('plantillas.AdminLTE_3_0_1.base')
@section('contenido')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--Modal para eliminar un proveedor--}}
    @include('compras::proveedor.modal_eliminar')
         
    {{--Modal para crear una nuevo proveedor--}}
    @include('compras::proveedor.modal_crear')
    
    {{--Modal para editar un proveedor--}}
    @include('compras::proveedor.modal_editar')

    <h2 class="row justify-content-center text-primary text-center">LISTA DE PROVEEDORES</h2>
    <h3>
        <button type="button" class="btn btn-primary col-12	col-sm-3	col-md-3	col-lg-3 col-xl-3"data-toggle="modal" data-target="" data-whatever="@mdo" onclick="IniciarModalCrear()">
            <i class="fas fa-plus-circle"></i> NUEVO PROVEEDOR</button>
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
@section('scripts')
<script src="{{asset("modules/compras/js/proveedor.js")}}"></script>
@endsection
