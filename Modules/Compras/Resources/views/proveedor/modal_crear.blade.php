

<div class="modal fade" id="modalcrearproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_proveedor">
                    <div class="row">

                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                            <label class="col-form-label">Tipo documento <span class="text-danger"> (*)</span></label>
                            <select name="tipo_documento" class="form-control selectpicker" data-live-search="true">
                              <option value="dni">DNI</option>
                              <option value="ruc">RUC</option>
                            </select>
                            <div id="error_tipo_documento"></div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                                <label class="col-form-label">Número de documento<span class="text-danger"> (*)</span></label>
                                <input type="text" class="form-control"  name="numero_documento"  placeholder="Ingrese el número de documento">
                                <div id="error_numero_documento"></div>
                           
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                                <label class="col-form-label">Nombre de la Empresa<span class="text-danger"> (*)</span></label>
                                <input type="text" class="form-control"  name="nombres"  placeholder="Ingrese el nombre del cliente">
                                <div id="error_nombres"></div>
                            
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                            <label class="col-form-label">Departamento<span class="text-danger">(*)</span></label>
                            <select name="" id="departamento" class="form-control selectpicker" data-live-search="true">
                                @foreach($ListaDepartamentos as $depa)
                                    <option value="{{$depa->id}}">{{$depa->nombre}}</option>
                                @endforeach
                            </select>
                            <div id="error_direccion"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                            <label class="col-form-label">Provincia<span class="text-danger">(*)</span></label>
                            <select name="" id="provincia" class="form-control ">                      
                                 {{--aqui se agrega las opciones con Jquery Lista de  provincias--}}                                
                            </select>
                            <div id="error_direccion"></div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                            <label class="col-form-label">Distrito <span class="text-danger">(*)</span></label>
                            <select name="" id="distrito" class="form-control">
                            {{--aqui se agrega las opciones con Jquery Lista de  distritos--}}   
                            </select>
                            <div id="error_direccion"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <label class="col-form-label">Ubicación</label>
                                    <input type="text" class="form-control"  name="telefono"  placeholder="Ingrese el número de celular ">
                                    <div id="error_telefono"></div>
                                
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                                <label class="col-form-label">Celular</label>
                                <input type="text" class="form-control"  name="telefono"  placeholder="Ingrese el número de celular ">
                                <div id="error_telefono"></div>
                            
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                            <label class="col-form-label">Email</label>
                            <input type="mail" class="form-control"  name="email"  placeholder="juan@gmail.com">
                            <div id="error_email"></div>
                        </div>
                    </div>
                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btn_proveedor">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
