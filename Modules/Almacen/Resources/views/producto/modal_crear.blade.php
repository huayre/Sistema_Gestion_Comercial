<div class="modal fade" id="modalcrearproducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_producto">
                    <div class="row" >
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                            <label class="col-form-label">Nombre <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nombre"  placeholder="Ingrese el nombre">
                            <div id="error_nombre"></div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg col-xl">
                            <label class="col-form-label">Categoría<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" name="categoria_id"  data-live-search="true">
                                @foreach($ListaCategorias as $cat)
                                    <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                @endforeach
                            </select>
                            <div id="error_categoria"></div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg col-xl">
                            <label class="col-form-label">Marca<span class="text-danger">*</span></label>
                            <select class="form-control selectpicker" name="marca_id" data-live-search="true">
                                @foreach($ListaMarcas as $mar)
                                    <option value="{{$mar->id}}">{{$mar->nombre}}</option>
                                @endforeach
                            </select>
                            <div id="error_marca"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                            <label class="col-form-label">Código de barras <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="codigo_barra"  placeholder="Ingrese el nombre">
                            <div id="error_codigo_barras"></div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg col-xl">
                            <label class="col-form-label">Precio venta (Unidad)<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="precio_venta_unidad"  placeholder="Ingrese el precio para la venta">
                            <div id="error_precio_venta_unidad"></div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg col-xl">
                            <label class="col-form-label">Stock<span class="text-danger">*</span></label>
                            <input type="number" class="form-control"  name="stock"  placeholder="Ingrese la cantidad del producto">
                            <div id="error_stock"></div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg col-xl">
                            <label class="col-form-label">Precio de compra<span class="text-danger">*</span></label>
                            <input type="number" class="form-control"  name="precio_compra"  placeholder="Ingrese el precio de la compra">
                            <div id="error_precio_compra"></div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-6 col-lg col-xl">
                            <label class="col-form-label">Alerta Mínima<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" name="alerta_minima"  placeholder="Ingrese la cantidad mínima para la alerta">
                            <div id="error_alerta"></div>
                        </div>
                    </div>
                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btn_producto">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
