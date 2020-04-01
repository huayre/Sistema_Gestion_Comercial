$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

var tabla=$('#tabla_productos').DataTable({
    processing: true,
    serverSide: true,
    ajax: "http://localhost:8000/producto",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'nombre', name: 'nombre'},
        {data: 'marca', name: 'marca'},
        {data: 'categoria', name: 'categoria'},
        {data:'precio_compra',name:'precio_compra'},
        {data:'alerta_minima',name:'alerta_minima'},
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

//funcion que  permite limpiar un modal cuando se inicialice
function LimpiarModal(){
    $('#formulario_producto').trigger('reset');
    $('#btn_producto').html('Guardar');
    $('#error_nombre').hide();
    $('#error_categoria').hide();
    $('#error_marca').hide();
    $('#error_codigo_barras').hide();
    $('#error_precio_venta_unidad').hide();
    $('#error_stock').hide();
    $('#error_precio_compra').hide();
    $('#error_alerta').hide();
}
//crear un nuevo producto
$('#btn_producto').click(function (e) {
    e.preventDefault();
    $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Creando...');

    $.ajax({
        data:$('#formulario_producto').serialize(),
        url: "http://localhost:8000/producto",
        type: "POST",
        dataType: 'json',
        success: function () {
            $('#modalcrearproducto').modal('hide');
            tabla.draw();
        },
        error: function ($datos) {
            $('#btn_producto').html('Guardar');
            $('#error_nombre').html('<p class="text-danger">'+$datos.responseJSON.errors.nombre[0]+'</p>').show();
            
        }
    });
});