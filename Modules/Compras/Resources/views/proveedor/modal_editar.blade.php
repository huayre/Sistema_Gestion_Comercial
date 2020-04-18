

<div class="modal fade" id="modaleditarproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_proveedor_editar">
                    <div class="row">

                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                            <label class="col-form-label">Tipo documento <span class="text-danger"> (*)</span></label>
                            <select name="tipo_documento" class="form-control" id="tipo_documento_editar">
                              <option value="">Seleccionar</option>
                              <option value="DNI">DNI</option>
                              <option value="RUC">RUC</option>
                            </select>
                            <div id="error_tipo_documento_editar"></div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                                <label class="col-form-label">Número de documento<span class="text-danger"> (*)</span></label>
                                <input type="text" class="form-control"  name="numero_documento" id="numero_documento_editar" placeholder="Ingrese el número de documento">
                                <div id="error_numero_documento_editar"></div>
                           
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                                <label class="col-form-label">Nombre de la Empresa o Persona<span class="text-danger"> (*)</span></label>
                                <input type="text" class="form-control"  name="nombre_empresa" id="nombre_empresa_editar" placeholder="Ingrese el nombre de la empresa o persona">
                                <div id="error_nombre_empresa_editar"></div>
                            
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                            <label class="col-form-label">Departamento<span class="text-danger">(*)</span></label>
                            <select name="ubicacion_departamento"  id="ubicacion_departamento_editar" class="form-control departamento">
                                <option value="">Seleccionar</option>
                                @foreach($ListaDepartamentos as $depa)                                   
                                    <option value="{{$depa->id}}">{{$depa->nombre}}</option>
                                @endforeach
                            </select>
                            <div id="error_ubicacion_departamento_editar"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                            <label class="col-form-label">Provincia<span class="text-danger">(*)</span></label>
                            <select name="ubicacion_provincia" id="ubicacion_provincia_editar" class="form-control provincia">                      
                                 {{--aqui se agrega las opciones con Jquery Lista de  provincias--}}                                
                            </select>
                            <div id="error_ubicacion_provincia_editar"></div>
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                            <label class="col-form-label">Distrito <span class="text-danger">(*)</span></label>
                            <select name="ubicacion_distrito" id="ubicacion_distrito_editar" class="form-control distrito">
                            {{--aqui se agrega las opciones con Jquery Lista de  distritos--}}   
                            </select>
                            <div id="error_ubicacion_distrito_editar"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="col-form-label">Ubicación</label>
                                <input type="text" class="form-control"  name="direccion" id="direccion_editar" placeholder="Ingrese la direccion de la empresa o persona">
                                <div id="error_direccion_editar"></div>
                                
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                                <label class="col-form-label">Celular de la emprea o Persona</label>
                                <input type="text" class="form-control"  name="telefono" id="telefono_editar" placeholder="Ingrese el número de celular ">
                                <div id="error_telefono_editar"></div>
                            
                        </div>

                        <div class="form-group col-12 col-sm-12 col-md-12 col-lg col-xl">
                            <label class="col-form-label">Email</label>
                            <input type="mail" class="form-control"  name="email" id="email_editar" placeholder="juan@gmail.com">
                            <div id="error_email_editar"></div>
                        </div>
                    </div>
                  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btn_proveedor_editar">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
