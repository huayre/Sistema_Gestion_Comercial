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
        {data: 'stock', name: 'stock'},
        {data: 'marca', name: 'marca'},
        {data: 'categoria', name: 'categoria'},
        {data:'precio_compra',name:'precio_compra'},
        {data:'alerta_minima',name:'alerta_minima'},
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ],

    language: {
        search: '<span class="text-info"><i class="fas fa-search"></i></span> _INPUT_',
        lengthMenu: '<i class="fas fa-align-justify text-primary"></i> _MENU_',
        emptyTable: "No existen registros",
        sZeroRecords:    "No se encontraron resultados",
        sInfoEmpty:      "No existen registros que contabilizar",
        sInfoFiltered:   "(filtrado de un total de _MAX_ registros)",
        sInfo:           "Mostrando del registro _START_ al _END_ de un total de _TOTAL_ datos",
        paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' },
        processing:'<div class="spinner-border text-info" role="status"><span class="sr-only"></span></div>'
    },
    rowCallback:function(row,data){      
        if(data[0]!=""){
            $valor=$($(row).find("td")[0]).html();
            $($(row).find("td")[0]).text('');
            $($(row).find("td")[0]).append('<span class="badge badge-pill badge-info">'+$valor+'</span>');        
          }
          if(data[1]!=""){
              $($(row).find("td")[1]).addClass('table-warning');
          }
          if(data[2]!=""){
            $($(row).find("td")[2]).addClass('table-info');
         }
         if(data[5]!=""){
            $($(row).find("td")[5]).addClass('table-success');
        }
        if(data[7]!=""){
            $($(row).find("td")[7]).addClass('d-flex justify-content-end');
        }
      
        
    }

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