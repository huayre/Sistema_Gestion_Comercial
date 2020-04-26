<div class="modal fade" id="modaleditarcategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formulario_categoria_editar">
                    <div class="form-group">
                        <label class="col-form-label">Nombre <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="nombre_editar" name="nombre"  placeholder="Ingrese el nombre">
                        <div id="error_nombre_editar"></div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" id="btn_categoria_editar">Guardar</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>