$(function () {
   $.ajaxSetup({
       headers:{
           'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       }
   });
});

var tabla=$('#tabla_marcas').DataTable({
    processing: true,
    serverSide: true,
    ajax: "http://localhost:8000/marca",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'nombre', name: 'nombre'},
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

function LimpiarModal() {
    $('#formulario_marca').trigger('reset');
    $('#error_nombre').hide();
    $('#btn_marca').html('Guardar')
    $('#modalcrearmarca').modal('show');

}

    $('#btn_marca').click(function (e) {
        e.preventDefault();
    $(this).html('Creando..');
    $.ajax({
        'data':$('#formulario_marca').serialize(),
        'type':'post',
        'url':'http://localhost:8000/marca',
        'dataType':'JSON',
        success :function () {
            $('#modalcrearmarca').modal('hide');
            tabla.draw();
        },
        error:function ($datos) {
            $('#btn_marca').html('Guardar');
            $('#error_nombre').html('<p class="text-danger">'+$datos.responseJSON.errors.nombre[0] + '</p>').show();
        }
    });
});

