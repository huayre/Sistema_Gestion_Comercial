<div class="modal fade" id="modalcrearcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               {{-- <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <span class="text-semibold">
                    <strong>Estimado Cliente!</strong>Los campos remarcados con <span class="text-danger">*</span> son necesarios.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </span>
                </div>--}}
                <form id="formulario_categoria">
                    <div class="form-group">
                        <label class="col-form-label">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Ingrese el nombre">
                        <div id="error_nombre"></div>
                    </div>

                    <div class="form-group">
                        <label >Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripcion de la categoria"></textarea>
                        <div id="error_descripcion"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btn_categoria">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
