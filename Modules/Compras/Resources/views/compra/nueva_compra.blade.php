@extends('plantillas.AdminLTE_3_0_1.base')
@section('contenido')

{{-- incluimos el modal para agregar los produstos a la lista --}}
@include('compras::compra.modal_agregar_productos')
<meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="row">
        <div class="col-8">
            <div class="card border border-info">
                <div class="card-header bg-info">
                    LISTADO DE LA COMPRA
                </div>
                <div class="card-body">
                    <div class="form-group">
                      <button class="btn btn-warning" onclick="IniciarModal()"><i class="fas fa-plus-circle"></i> AGREGAR PRODUCTO</button>
                    </div>
                    {{-- Tabla de para el listado de los productos --}}
                    <div class="table-responsive">
                        <table class="table table-hover table-sm">
                            <thead class="table-warning">
                                <tr>
                                    <th>#</th>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>PrécioUnitario</th>
                                    <th>Descuento</th>
                                    <th>Sub Total</th>
                                    <th></th>
                                </tr>
                            </thead>                            
                            <tbody  id="detalles_compra">
                            </tbody>
                            <tfoot>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="table-warning h4 text-success font-weight-bold">TOTAL</th>
                                <th class="table-warning text-success"><h4  class="font-weight-bold" id="total">S/ 0.00</h4></th>
                            </tfoot>
                        </table>

                    </div>

                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card border border-info">
                <div class="card-header bg-info">
                    DATOS
                </div>
                <div class="card-body">
                    <form id="formulario_datos_generales_compra">
                        <div class="form-group">
                            <label for="">Tipo de Comprobante</label>
                            <select name="tipo_comprobante"  class="form-control" id="tipo_comprobante">
                                <option value="BOLETA">BOLETA</option>
                                <option value="FACTURA">FACTURA</option>
                                
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Serie de Comprobante</label>
                            <input type="text" name="serie_comprobante"  class="form-control" placeholder="Ingrese la Serie del documento" id="serie_comprobante">
                        </div>

                        <div class="form-group">
                            <label for="">Número de Comprobante</label>
                            <input type="text" name="numero_comprobante"  class="form-control" placeholder="Ingrese el Número del documento" id="numero_comprobante">
                        </div>

                        <div class="form-group">
                            <label for="">Fecha de Compra</label>
                            <input type="date" name="fecha_compra"  class="form-control" placeholder="Ingrese el Número del documento" id="fecha_compra">
                        </div>

                        <div class="form-group">
                            <label for="">Proveedor</label>
                            <div class="input-group">
                                <select name="proveedor_id"  class="form-control" id="proveedor_id">
                                    @foreach ($ListaProveedor as $pro)
                                        <option value="{{$pro->id}}">{{$pro->nombre_empresa}}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="button"><i class="fas fa-plus-circle"></i></button>
                                </div>
                            </div>
                            
                        </div>
                        <button  id="btn_registrar_compra" class="btn btn-primary btn-lg btn-block"><i class="far fa-file-alt"></i> REGISTRAR COMPRA</button>
                    </form>

                </div>
            </div>
            
        </div>      
    </div>
    <script>
        var url_global='{{url("/")}}';
        //var store = <?php echo json_encode(route('compra.store')) ?>;
    </script>
@endsection
@section('scripts')
<script src="{{asset("modules/compras/js/compra.js")}}"></script>
@endsection
