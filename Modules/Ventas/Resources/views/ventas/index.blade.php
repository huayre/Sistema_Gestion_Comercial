@extends('plantillas.AdminLTE_3_0_1.base')
@section('contenido')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <h2 class="row justify-content-center text-primary">LISTADO DE VENTAS</h2>
    <h3>
        <a href="{{route('venta.create')}}" class="btn btn-primary"> <i class="fas fa-plus-circle"></i> NUEVA VENTA</a>
    </h3>
  <div class="table-responsive">
    <table class="table table-hover" id="tabla_categorias" >
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
<script src="{{asset("modules/almacen/js/venta.js")}}"></script>
@endsection
