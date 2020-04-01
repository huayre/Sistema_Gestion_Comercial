@extends('plantillas.AdminLTE_3_0_1.base')
@section('contenido')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--Modal para eliminar una nueva categoria--}}
    @include('almacen::categoria.modal_eliminar')
    {{--Modal para crear una nuevo producto--}}
    @include('ventas::clientes.modal_crear')
    <h2 class="row justify-content-center text-primary">LISTA DE CLIENTES</h2>
    <h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcrearcliente" data-whatever="@mdo" onclick="LimpiarModal()">
            <i class="fas fa-plus-circle"></i> NUEVO CLIENTE</button>
    </h3>
  <div class="table-responsive">
    <table class="table table-hover w-100" id="tabla_clientes" >
        <thead class="bg-primary">
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Tipo Documento</th>
            <th>Número documento</th>
            <th>Dirección</th>
            <th>Telefono</th>
            <th>Email</th>
            <th width="280px">Opciones</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
  </div>
@endsection
@section('scripts')
<script src="{{asset("modules/ventas/js/cliente.js")}}"></script>
@endsection
