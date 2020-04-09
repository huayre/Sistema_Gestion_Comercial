@extends('plantillas.AdminLTE_3_0_1.base')
@section('contenido')
    {{--Modal para eliminar una nueva categoria--}}
    @include('almacen::categoria.modal_eliminar')

    {{--Modal para editar una nueva categoria--}}
    @include('almacen::categoria.modal_editar')

    {{--Modal para crear una nueva categoria--}}
    @include('almacen::categoria.modal_crear')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h2 class="row justify-content-center text-primary text-center">LISTADO DE CATEGORÍAS</h2>
    <h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcrearcategoria" data-whatever="@mdo" onclick="LimpiarModal()">
            <i class="fas fa-plus-circle"></i> NUEVA CATEGORÍA</button>
    </h3>
  <div class="">
    <table class="table table-responsive table-hover  w-100  " id="tabla_categorias" >
        <thead class="bg-primary">
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th width="280px">Opciones</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
  </div>
@endsection
@section('scripts')
<script src="{{asset("modules/almacen/js/categoria.js")}}"></script>
@endsection
