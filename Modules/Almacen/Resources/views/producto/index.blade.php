@extends('plantillas.AdminLTE_3_0_1.plantilla')
@section('contenido')
    {{--Modal para eliminar una nueva categoria--}}
    @include('almacen::categoria.modal_eliminar')
    {{--Modal para crear una nueva categoria--}}
    @include('almacen::categoria.modal_crear')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h2 class="row justify-content-center text-primary">LISTADO DE PRODUCTOS</h2>
    <h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcrearcategoria" data-whatever="@mdo" onclick="LimpiarModal()">
            <i class="fas fa-plus-circle"></i> NUEVA CATEGORÍA</button>
    </h3>
  <div class="table-responsive">
    <table class="table table-hover" id="tabla_productos" >
        <thead class="bg-primary">
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Categoría</th>
            <th width="280px">Opciones</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
  </div>
@endsection
@section('scripts')
<script src="{{asset("modules/almacen/js/producto.js")}}"></script>
@endsection
