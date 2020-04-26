@extends('plantillas.AdminLTE_3_0_1.base')
@section('contenido')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--Modal para eliminar una unidad de medida--}}
    @include('almacen::unidadmedida.modal_eliminar')

    {{--Modal para editar una unidad de medida--}}
    @include('almacen::unidadmedida.modal_editar')

    {{--Modal para crear una nueva unidad de medida--}}
    @include('almacen::unidadmedida.modal_crear')
    <h2 class="row justify-content-center text-primary ">LISTADO DE UNIDADES DE MEDIDA</h2>
    <h3>
        <button type="button" class="btn btn-primary" data-toggle="modal"  data-whatever="@mdo" onclick="IniciarModalCrear()">
            <i class="fas fa-plus-circle"></i> NUEVA UNIDAD DE MEDIDA</button>
    </h3>
    <div class=" table-responsive">
        <table class="table table-hover w-100" id="tabla_medidas" >
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
    <script src="{{asset("modules/almacen/js/medida.js")}}"></script>
@endsection
