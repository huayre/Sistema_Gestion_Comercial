@extends('plantillas.AdminLTE_3_0_1.base')
@section('contenido')
<meta name="csrf-token" content="{{ csrf_token() }}">

    {{--Modal para eliminar una nueva categoria--}}
    @include('almacen::categoria.modal_eliminar')
    {{--Modal para crear una nuevo producto--}}
    @include('almacen::producto.modal_crear')
    
    <h2 class=" text-primary text-center">LISTADO DE PRODUCTOS</h2>
    <h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcrearproducto" data-whatever="@mdo" onclick="LimpiarModal()">
            <i class="fas fa-plus-circle"></i> NUEVO PRODUCTO</button>
    </h3>
  <div class="table-responsive">
    <table class="table table-hover w-100" id="tabla_productos" >
        <thead class="bg-primary">
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Marca</th>
            <th>U. Medida</th>            
            <th> nº de Alerta</th>
            <th class="text-center">Opciones</th>
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
