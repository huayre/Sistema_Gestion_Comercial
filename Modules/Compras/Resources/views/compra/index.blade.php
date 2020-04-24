@extends('plantillas.AdminLTE_3_0_1.base')
@section('contenido')
       
    <h2 class="row justify-content-center text-primary text-center">LISTA DE PROVEEDORES</h2>
    
    <h3>
        <a href="{{route('compra.create')}}"  class="btn btn-primary">
            <i class="fas fa-plus-circle"></i> NUEVA COMPRA
        </a>
    </h3>
    
  <div class="table-responsive">
    <table class="table table-hover w-100" id="tabla_compras" >
        <thead class="bg-primary">
        <tr>
            <th>N°</th>            
            <th>Tipo Comprobante</th>
            <th>Número documento</th>
            <th>Fecha Compra</th>
            <th>Précio Compra</th>
            <th>Detalle Compra</th>
            <th>Proveedor</th>
            <th>Opciones</th>
            
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
  </div>
@endsection
@section('scripts')
<script src="{{asset("modules/compras/js/compra_index.js")}}"></script>
@endsection
