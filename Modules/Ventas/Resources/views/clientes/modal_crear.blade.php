

<div class="modal fade" id="modalcrearcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_cliente">
                    <div class="row">
                        <div class="form-group col">
                            <label class="col-form-label">Tipo documento <span class="text-danger">*</span></label>
                            <select name="tipo_documento" class="form-control selectpicker" data-live-search="true">
                              <option value="dni">DNI</option>
                              <option value="ruc">RUC</option>
                            </select>
                            <div id="error_tipo_documento"></div>
                        </div>

                        <div class="form-group col">
                                <label class="col-form-label">Número de documento<span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  name="numero_documento"  placeholder="Ingrese el nombre">
                                <div id="error_numero_documento"></div>
                           
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="form-group col">
                                <label class="col-form-label">Nombres<span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  name="nombres"  placeholder="Ingrese el nombre">
                                <div id="error_nombres"></div>
                            
                        </div>

                        <div class="form-group col">
                            <label class="col-form-label">Dirección<span class="text-danger">*</span></label>
                            <input type="text" class="form-control"  name="direccion"  placeholder="Ingrese el nombre">
                            <div id="error_direccion"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                                <label class="col-form-label">Telefono<span class="text-danger">*</span></label>
                                <input type="text" class="form-control"  name="telefono"  placeholder="Ingrese el nombre">
                                <div id="error_telefono"></div>
                            
                        </div>

                        <div class="form-group col">
                            <label class="col-form-label">Email<span class="text-danger">*</span></label>
                            <input type="mail" class="form-control"  name="email"  placeholder="Ingrese el nombre">
                            <div id="error_email"></div>
                        </div>
                    </div>
                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btn_cliente">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
