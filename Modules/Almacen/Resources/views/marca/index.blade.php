@extends('plantillas.AdminLTE_3_0_1.base')
@section('contenido')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--Modal para eliminar una marca--}}
    @include('almacen::marca.modal_eliminar')

    {{--Modal para editar una marca--}}
    @include('almacen::marca.modal_editar')

    {{--Modal para crear una nueva categoria--}}
    @include('almacen::marca.modal_crear')
    <h2 class="row justify-content-center text-primary ">LISTADO DE MARCAS</h2>
    <h3>
        <button type="button" class="btn btn-primary" data-toggle="modal"  data-whatever="@mdo" onclick="IniciarModalCrear()">
            <i class="fas fa-plus-circle"></i> NUEVA MARCA</button>
    </h3>
    <div class=" table-responsive">
        <table class="table table-hover w-100" id="tabla_marcas" >
            <thead class="bg-primary">
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Fecha de Registro</th>
                <th width="280px" class="text-center">Opciones</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection
@section('scripts')
    <script src="{{asset("modules/almacen/js/marca.js")}}"></script>
@endsection
