@extends('plantillas.AdminLTE_3_0_1.base')
@section('contenido')
<div class="row">
    <div class="card col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8 ">
        <div class="card-head ">
        
        </div>
        <div class="card-body">
           <select name="" id="" class="form-control">
               @foreach($ListaClientes as $cli)
               <option value="">{{$cli->nombres}}</option>
               @endforeach
           </select>
        </div>
    </div>

    <div class="card col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4 border border-light">
        <div class="card-head">
           
        </div>
        <div class="card-body">
        <select name="" id="" class="form-control">
               @foreach($ListaProductos as $pro)
               <option value="">{{$pro->nombre}}</option>
               @endforeach
           </select>
        </div>
    </div>

    
</div>
    
@endsection