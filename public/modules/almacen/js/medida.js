//Token que usamos los formuarios
$(function () {
   $.ajaxSetup({
       headers:{
           'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
       }
   });
});
//Mostrar  la lista de marcas en la tabla 
var tabla=$('#tabla_medidas').DataTable({
    processing: true,
    serverSide: true,
    ajax: "medida",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'nombre', name: 'nombre'},
        {data:'created_at',name:'created_at'},
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


        //CREAR
//Funcion que permite iniciar el formulario crear -->es llamado por el boton "CREAR NUEVO USUARIO"
function IniciarModalCrear() {
    $('#formulario_medida_crear').trigger('reset');
    $('#error_nombre_crear').hide();
    $('#btn_crear_medida').html('Guardar');
    $('#modalcrearmedida').modal('show');

}
//permite crear una nueva marca ->es ejecutado cuando presionamos el boton CREAR
    $('#btn_crear_medida').click(function (e) {
        e.preventDefault();
    $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Creando...');
    $.ajax({
        'data':$('#formulario_medida_crear').serialize(),
        'type':'post',
        'url':'medida',
        'dataType':'JSON',
        success :function () {
            $('#modalcrearmedida').modal('hide');            
            MensageSuccessCrear();
            tabla.draw();
           
        },
        error:function (datos) {
            $('#btn_crear_medida').html('Guardar');
            if(datos.responseJSON.hasOwnProperty('errors')){
                if(datos.responseJSON.errors.nombre){
                    $('#error_nombre_crear').html('<p class="text-danger">'+datos.responseJSON.errors.nombre[0] + '</p>').show();
                }
               
            }
            
           
        }
    });
});

//Alerta Success Crear

function MensageSuccessCrear(){
    $.toast({
        text: 'La Medida Fué Creado Correctamente',
        icon: 'success',
        position:'top-right',
        bgColor: '#21D848',
        textColor: 'white',
        loaderBg:'#E3F85B'
    })  
}




   //ELIMINAR

var medida_id_eliminar;
$(document).on('click','.eliminar',function () {
    medida_id_eliminar=$(this).data("id");
    $('#modaleliminar').modal('show');
    $('#btn_eliminar').html('Eliminar');
    $('#btn_eliminar').attr('disabled',false);
    $('#borrado_mensaje_error').hide();
})

$('#btn_eliminar').click(function(){
    $('#btn_eliminar').html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Eliminando...');
    $.ajax({
        type: "DELETE",
        url:"medida/"+ medida_id_eliminar,
        success:function(data)
        {   $('#modaleliminar').modal('hide');     
            tabla.draw();
            MensageSuccessEmininar();
        },
        error:function () {
            $('#borrado_mensaje_error').html('<i class="fas fa-exclamation-triangle"></i>'+' La Unidad de Medida que deséa eliminar pertenece a un producto').show();
            $('#btn_eliminar').html('Eliminar');
          $('#btn_eliminar').attr('disabled',true);
        }
    })
});

//Mensaje Success Elimar 
function MensageSuccessEmininar(){
    $.toast({
        text: 'La Unidad de Medida Fué Eliminado Correctamente',
        icon: 'success',
        position:'top-right',
        bgColor: '#21D848',
        textColor: 'white',
        loaderBg:'#E3F85B'
    })
  
}


    //EDITAR
//funcion que permite iniciar el modal cuando presionamos el boton EDITAR
function IniciarModalEditar() {
    $('#formulario_medida_editar').trigger('reset');
    $('#error_nombre_editar').hide();
    $('#btn_editar_medida').html('Guardar');
    $('#modaleditarmedida').modal('show');

}
//Pemite extraer los datos para editar la marca
var medida_id_editar
$('body').on('click','.editar',function(){
    IniciarModalEditar();
    medida_id_editar=$(this).data('id');   
    $.get("medida/"+medida_id_editar+'/edit', function (datos) {
    $('#nombre_editar').val(datos.nombre);
    
})
});

//Guardar cambios de una marca 

$('#btn_editar_medida').click(function (e) {
    e.preventDefault();
$(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Actualizando...');
$.ajax({
    'data':$('#formulario_medida_editar').serialize(),
    'type':'PUT',
    'url':'medida/'+medida_id_editar,
    'dataType':'JSON',
    success :function () {
        $('#modaleditarmedida').modal('hide');
        tabla.draw();
        MensageSuccessEditar();
       
    },
    error:function ($datos) {
        $('#btn_editar_medida').html('Guardar');
        $('#error_nombre_editar').html('<p class="text-danger">'+$datos.responseJSON.errors.nombre[0] + '</p>').show();
    }
});
});

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