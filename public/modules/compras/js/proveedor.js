$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

    var table=$('#tabla_proveedores').DataTable({
        processing: true,
        serverSide: true,
        ajax: "proveedor",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nombre_empresa', name: 'nombre_empresa'},
            {data: 'tipo_documento', name: 'tipo_documento'},
            {data: 'numero_documento', name: 'numero_documento'},
            {data: 'departamento', name: 'departamento'},
            {data: 'ubicacion_provincia', name: 'ubicacion_provincia'},
            {data: 'ubicacion_distrito', name: 'ubicacion_distrito'},
            {data: 'telefono', name: 'telefono'},
            {data: 'email', name: 'email'},
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
//Funcion que permite inicializar el modal para crear nuevo proveedor
function IniciarModalCrear(){
    $('#btn_proveedor').html('Guardar');
    $('#formulario_proveedor').trigger('reset');    
    $('#modalcrearproveedor').modal('show'); 
    ResetearMensageError();
}
//funcion que permite resetear los mensajer de error
function ResetearMensageError(){
    $('#error_tipo_documento').hide();
    $('#error_numero_documento').hide();
    $('#error_nombre_empresa').hide();
    $('#error_ubicacion_departamento').hide();
    $('#error_ubicacion_provincia').hide();
    $('#error_ubicacion_distrito').hide();
}

//Select dinámico Departamento,Provincia,Distrito
//buscar una provincia presionando una opción de la lista de departamentos
$('.departamento').change(function(){
    DepartamentoSeleccionado=$(this).val();
   
    $.get('provincia/'+DepartamentoSeleccionado+'/buscar',function(datos){
        $('.provincia').empty();
        $('.provincia').append('<option value="">Seleccionar</option>');
        $.each(datos, function (index, value) {
            $('.provincia').append('<option value='+value.id+'>'+value.nombre+'</option>');
        });
       
    });
});
//buscar una provincia presionando una opción de la lista de departamentos
$('.provincia').change(function(){
    ProvinciaSeleccionado=$(this).val();
         $.get('distrito/'+ProvinciaSeleccionado+'/buscar',function(datos){
         $('.distrito').empty();
         $('.distrito').append('<option value="">Seleccionar</option>')
         $.each(datos,function(index,value){
            $('.distrito').append('<option value='+value.id+'>'+value.nombre+'</option>')
         });
    });
});
//CREAR  UN NUEVO PROVEEDOR
$('#btn_proveedor').click(function(e){
 e.preventDefault();
 $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Creando...');
 ResetearMensageError();
 $.ajax({
  data:$('#formulario_proveedor').serialize(),
  url:"proveedor",
  type:"POST",
  dataType:'json',
  success:function(){
      $('#modalcrearproveedor').modal('hide');
      MensageSuccessCrear();
      table.draw();
  },
  error:function(datos){
    $('#btn_proveedor').html('Guardar');  
    if(datos.responseJSON.hasOwnProperty('errors')){
        //valido que tenga el error nombre
        if(datos.responseJSON.errors.tipo_documento){
            $('#error_tipo_documento').html('<p class="text-danger">'+datos.responseJSON.errors.tipo_documento[0] + '</p>').show();
        }
        if(datos.responseJSON.errors.numero_documento){
            $('#error_numero_documento').html('<p class="text-danger">'+datos.responseJSON.errors.numero_documento[0] + '</p>').show(); 
        }
        if(datos.responseJSON.errors.nombre_empresa){
            $('#error_nombre_empresa').html('<p class="text-danger">'+datos.responseJSON.errors.nombre_empresa[0] + '</p>').show();
        }
        if(datos.responseJSON.errors.ubicacion_departamento){
            $('#error_ubicacion_departamento').html('<p class="text-danger">'+datos.responseJSON.errors.ubicacion_departamento[0] + '</p>').show();
        }
        if(datos.responseJSON.errors.ubicacion_provincia){
            $('#error_ubicacion_provincia').html('<p class="text-danger">'+datos.responseJSON.errors.ubicacion_provincia[0] + '</p>').show();
        }
        if(datos.responseJSON.errors.ubicacion_distrito){
            $('#error_ubicacion_distrito').html('<p class="text-danger">'+datos.responseJSON.errors.ubicacion_distrito[0] + '</p>').show();
        }
    }  
      
    
    
  }

 });
});

//mensaje success crear proveedor
function MensageSuccessCrear(){
    $.toast({
        text: 'La Marca Fué Creado Correctamente',
        icon: 'success',
        position:'top-right',
        bgColor: '#21D848',
        textColor: 'white',
        loaderBg:'#E3F85B'
    })  
}

//ELIMINAR PROVEEDOR
//Extraer el id del proveedor para eliminar
var ProveedorEncontradoIdEliminar;
$('body').on('click','.eliminar',function(){
    ProveedorEncontradoIdEliminar=$(this).data('id');
    $('#modaleliminar').modal('show');
    $('#btn_eliminar').html('Eliminar');
    $('#btn_eliminar').attr('disabled',false);
    $('#borrado_mensaje_error').hide();
});
//eliminar el proveedor despues de confirmar el modal
$('#btn_eliminar').click(function(){
    $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Eliminando...');
    $.ajax({
        method:'DELETE',
        url:'proveedor/'+ProveedorEncontradoIdEliminar,        
        success:function(){
            $('#modaleliminar').modal('hide');
            MensageSuccessEliminar();
            table.draw();
        },
        error:function(){
            $('#borrado_mensaje_error').html('<i class="fas fa-exclamation-triangle"></i>'+' La Unidad de Medida que deséa eliminar pertenece a un producto').show();
            $('#btn_eliminar').html('Eliminar');
          $('#btn_eliminar').attr('disabled',true);
        }
    });
})
   
//mensaje success eliminar proveedor
function MensageSuccessEliminar(){
    $.toast({
        text: 'El proveedor fue eliminado Correctamente',
        icon: 'success',
        position:'top-right',
        bgColor: '#21D848',
        textColor: 'white',
        loaderBg:'#E3F85B'
    })  
}
//EDITAR
//Funcion que permite inicializar el modal para crear nuevo proveedor
function IniciarModalEditar(){
    $('#btn_proveedor_editar').html('Guardar');
    $('#formulario_proveedor_editar').trigger('reset');    
    $('#modaleditarproveedor').modal('show'); 
    ResetearMensageError();
}
//extraer datos de un proveedor para editar
var ProveedorBuscarIdEditar
$('body').on('click','.editar',function(){
    IniciarModalEditar();
    ProveedorBuscarIdEditar=$(this).data('id');   
    $.get("proveedor/"+ProveedorBuscarIdEditar+'/edit', function (datos) {
    $('#tipo_documento_editar').val(datos.tipo_documento);
    $('#numero_documento_editar').val(datos.numero_documento);
    $('#nombre_empresa_editar').val(datos.nombre_empresa);
    $('#ubicacion_departamento_editar').val(datos.ubicacion_departamento);
    $('#ubicacion_provincia_editar').val(datos.ubicacion_provincia);
    $('#ubicacion_distrito_editar').val(datos.ubicacion_distrito);
    $('#direccion_editar').val(datos.direccion);
    $('#telefono_editar').val(datos.telefono);
    $('#email_editar').val(datos.email);
    
})
});

//editar datos de un proveedor

$('#btn_proveedor_editar').click(function(e){
    e.preventDefault();
    $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Actualizando...');
    ResetearMensageError();
    $.ajax({
     data:$('#formulario_proveedor_editar').serialize(),
     url:"proveedor/"+ProveedorBuscarIdEditar,
     type:"PUT",
     dataType:'json',
     success:function(){
         $('#modaleditarproveedor').modal('hide');
         MensageSuccessEditar();
         table.draw();
     },
     error:function(datos){
       $('#btn_proveedor_editar').html('Guardar');  
       if(datos.responseJSON.hasOwnProperty('errors')){
           //valido que tenga el error nombre
           if(datos.responseJSON.errors.tipo_documento){
               $('#error_tipo_documento_editar').html('<p class="text-danger">'+datos.responseJSON.errors.tipo_documento[0] + '</p>').show();
           }
           if(datos.responseJSON.errors.numero_documento){
               $('#error_numero_documento_editar').html('<p class="text-danger">'+datos.responseJSON.errors.numero_documento[0] + '</p>').show(); 
           }
           if(datos.responseJSON.errors.nombre_empresa){
               $('#error_nombre_empresa_editar').html('<p class="text-danger">'+datos.responseJSON.errors.nombre_empresa[0] + '</p>').show();
           }
           if(datos.responseJSON.errors.ubicacion_departamento){
               $('#error_ubicacion_departamento_Editar').html('<p class="text-danger">'+datos.responseJSON.errors.ubicacion_departamento[0] + '</p>').show();
           }
           if(datos.responseJSON.errors.ubicacion_provincia){
               $('#error_ubicacion_provincia_editar').html('<p class="text-danger">'+datos.responseJSON.errors.ubicacion_provincia[0] + '</p>').show();
           }
           if(datos.responseJSON.errors.ubicacion_distrito){
               $('#error_ubicacion_distrito_editar').html('<p class="text-danger">'+datos.responseJSON.errors.ubicacion_distrito[0] + '</p>').show();
           }
       }  
         
       
       
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