

<div class="modal fade" id="modal_agregar_productos_compra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Produtos o Servicios a la Compra</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                         <div class="row">
                            <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                                <label class="col-form-label">Producto<span class="text-danger">(*)</span></label>
                                <select name="item_producto"  class="form-control selectpicker" id="item_producto" data-live-search="true"  data-size="5">                                    
                                    <option value="">Seleccionar</option>
                                    @foreach($ListaProductos as $pro)                                   
                                        <option value="{{$pro->id}}">{{$pro->nombre}}</option>
                                    @endforeach
                                </select>
                                <div id="error_item_producto"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col">
                              <label class="col-form-label">Cantidad<span class="text-danger">(*)</span></label>
                              <input type="number" name="item_cantidad" id="item_cantidad" class="form-control" placeholder=""  pattern="[1-9]+">
                              <div id="error_item_cantidad"></div>
                            </div>

                            <div class="form-group col">
                                <label class="col-form-label">Precio Unitario<span class="text-danger">(*)</span></label>
                                <input type="number" name="item_precio" id="item_precio" class="form-control" placeholder="" min="0">
                                <div id="error_item_precio"></div>
                              </div>
                        </div>
                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="btn_agregar_item_producto">Agregar A la Lista</button>
                    </div>
            </div>
        </div>
    </div>
</div>
