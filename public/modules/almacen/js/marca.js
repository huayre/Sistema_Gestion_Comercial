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
    $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Creando...');
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

var marca_id;
$(document).on('click','.eliminar',function () {
    marca_id=$(this).data("id");
    $('#modaleliminar').modal('show');
    $('#btn_eliminar').html('Eliminar');
    $('#btn_eliminar').attr('disabled',false);
    $('#borrado_mensaje_error').hide();
})

$('#btn_eliminar').click(function(){
    $('#btn_eliminar').html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Eliminando...');
    $.ajax({
        type: "DELETE",
        url:"http://localhost:8000/marca/"+marca_id,
        success:function(data)
        {   $('#modaleliminar').modal('hide');

            $.toast({
                text: 'La Marca Fué Eliminado Correctamente',
                icon: 'success',
                position:'top-right',
                bgColor: '#21D848',
                textColor: 'white',
                loaderBg:'#E3F85B'
            })
            tabla.draw();
        },
        error:function () {
            $('#borrado_mensaje_error').html('<i class="fas fa-exclamation-triangle"></i>'+' La marca que deséa eliminar pertenece a un producto').show();
            $('#btn_eliminar').html('Eliminar');
          $('#btn_eliminar').attr('disabled',true);
        }
    })
});

