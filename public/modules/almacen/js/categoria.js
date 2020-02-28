$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

    var table= $('#tabla_categorias').DataTable({
        processing: true,
        serverSide: true,
        ajax: "http://localhost:8000/categoria",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nombre', name: 'nombre'},
            {data: 'descripcion', name: 'descripcion'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],

        language: {
            search: '<span>Buscar:</span> _INPUT_',
            lengthMenu: '<span>Ver:</span> _MENU_',
            emptyTable: "No existen registros",
            sZeroRecords:    "No se encontraron resultados",
            sInfoEmpty:      "No existen registros que contabilizar",
            sInfoFiltered:   "(filtrado de un total de _MAX_ registros)",
            sInfo:           "Mostrando del registro _START_ al _END_ de un total de _TOTAL_ datos",
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' },
            processing: "Cargando..."
        },

    });



//funcion que permite limpiar un modal cuando se inicialice
 function LimpiarModal() {
   $('#formulario_categoria').trigger('reset');
   $('#btn_categoria').html('Guardar');
   $('#error_nombre').hide();
   $('#error_estado').hide();
}
//Crear una nueva categoria
$('#btn_categoria').click(function (e) {
    e.preventDefault();
    $(this).html('Creando...');

    $.ajax({
        data: $('#formulario_categoria').serialize(),
        url: "http://localhost:8000/categoria",
        type: "POST",
        dataType: 'json',
        success: function () {
            $('#modalcrearcategoria').modal('hide');
            table.draw();
        },
        error: function (data) {
            $('#btn_categoria').html('Guardar');
            $('#error_nombre').html('<p class="text-danger">'+data.responseJSON.errors.nombre[0] + '</p>').show();
            $('#error_descripcion').html('<p class="text-danger">'+data.responseJSON.errors.descripcion[0] + '</p>').show();
        }
    });
});

var categoria_id;
$(document).on('click', '.eliminar', function(){
        categoria_id=$(this).data("id");
        $('#modaleliminar').modal('show');
    $('#btn_eliminar').html('Eliminar');

});

$('#btn_eliminar').click(function(){
    $('#btn_eliminar').html('Eliminando...');
    $.ajax({
        type: "DELETE",
        url:"http://localhost:8000/categoria/"+categoria_id,
        success:function(data)
        {   $('#modaleliminar').modal('hide');

            $.toast({
                text: 'La Categoría Fué Eliminado Correctamente',
                icon: 'success',
                position:'top-right',
                bgColor: '#21D848',
                textColor: 'white',
                loaderBg:'#E3F85B'
            })
            table.draw();
        }
    })
});

var categoria_id_editar;
$(document).on('click','.editar',function () {
    categoria_id_editar=$(this).data("id");
    $('#modalcrearcategoria').modal('show');
    console.log(categoria_id_editar);

})
