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
        ajax: "categoria",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nombre', name: 'nombre'},
            {data:'created_at',name:'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],

        language: {
            search: '<span class="text-info"><i class="fas fa-search"></i></span>_INPUT_',
            lengthMenu: '<i class="fas fa-align-justify text-primary"></i> _MENU_',
            emptyTable: "No existen registros",
            sZeroRecords:    "No se encontraron resultados",
            sInfoEmpty:      "No existen registros que contabilizar",
            sInfoFiltered:   "(filtrado de un total de _MAX_ registros)",
            sInfo:           "Mostrando del registro _START_ al _END_ de un total de _TOTAL_ datos",
            paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' },
            processing: '<div class="spinner-border text-info" role="status"><span class="sr-only"></span></div>'
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
              if(data[1]!=""){
                $($(row).find("td")[3]).addClass('d-flex justify-content-end');
            }
            
        }

    });


//CREAR UNA NUEVA CATEGORIA
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
    $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Creando...');

    $.ajax({
        data: $('#formulario_categoria').serialize(),
        url: "categoria",
        type: "POST",
        dataType: 'json',
        success: function () {
            $('#modalcrearcategoria').modal('hide');
            MensageSuccessEliminar();
            table.draw();
        },
        error: function (datos) {            
            $('#btn_categoria').html('Guardar');
            if(datos.responseJSON.hasOwnProperty('errors')){
                if(datos.responseJSON.errors.nombre){
                    $('#error_nombre').html('<p class="text-danger">'+datos.responseJSON.errors.nombre[0] + '</p>').show();
                }
                            
            }
        }
    });
});
//
//Mensaje Success Eliminar
function MensageSuccessEliminar(){
    $.toast({
        text: 'La Categoria fue Correctamente',
        icon: 'success',
        position:'top-right',
        bgColor: '#21D848',
        textColor: 'white',
        loaderBg:'#E3F85B'
    })
  
}
//ELIMINAR
var categoria_id;
$(document).on('click', '.eliminar', function(){
        categoria_id=$(this).data("id");
        $('#modaleliminar').modal('show');
        $('#btn_eliminar').html('Eliminar');
        $('#borrado_mensaje_error').hide();
        $('#btn_eliminar').attr('disabled',false);


});

$('#btn_eliminar').click(function(){
    $('#btn_eliminar').html('<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Eliminando...');
    $.ajax({
        type: "DELETE",
        url:"categoria/"+categoria_id,
        success:function(data){
        $('#modaleliminar').modal('hide');
        table.draw();
        MensageSuccessEliminar();
        },
        error:function(){
            $('#borrado_mensaje_error').html('<i class="fas fa-exclamation-triangle"></i>'+' La Categoria que deséa eliminar pertenece a un producto').show();
            $('#btn_eliminar').html('Eliminar');
            $('#btn_eliminar').attr('disabled',true);
        }
    })
});


function MensageSuccessEliminar(){    {  

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
}



//EDITAR
function  IniciarModalEditar() {
    $('#formulario_categoria_editar').trigger('reset');
    $('#btn_categoria_editar').html('Guardar');
    $('#error_nombre_editar').hide();
    $('#modaleditarcategoria').modal('show');
 }
 var categoria_id_editar;
$('body').on('click','.editar',function(){
    categoria_id_editar=$(this).data("id");
    IniciarModalEditar();        
    $.get("categoria/"+categoria_id_editar+'/edit', function (datos) {
    $('#nombre_editar').val(datos.nombre);
    
})
});

$('#btn_categoria_editar').click(function(e){
    e.preventDefault();
    $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Actualizando...');
    $.ajax({
        'data':$('#formulario_categoria_editar').serialize(),
        'type':'PUT',
        'url':'categoria/'+categoria_id_editar,
        'dataType':'JSON',
        success :function () {
            $('#modaleditarcategoria').modal('hide');
            table.draw();
            MensageSuccessEditar();
           
        },
        error:function ($datos) {
            $('#btn_categoria_editar').html('Guardar');
            $('#error_nombre_editar').html('<p class="text-danger">'+$datos.responseJSON.errors.nombre[0] + '</p>').show();            
        }
    });
})

//Mensaje Success Editar
function MensageSuccessEditar(){
    $.toast({
        text: 'Los Datos Fueron Actualizados Correctamente',
        icon: 'success',
        position:'top-right',
        bgColor: '#21D848',
        textColor: 'white',
        loaderBg:'#E3F85B'
    })
  
}

