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
            {data: 'ubicacion_departamento', name: 'ubicacion_departamento'},
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
function LimpiarModal(){
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
$('#departamento').change(function(){
    DepartamentoSeleccionado=$(this).val();
   
    $.get('provincia/'+DepartamentoSeleccionado+'/buscar',function(datos){
        $('#provincia').empty();
        $('#provincia').append('<option value="">Seleccionar</option>');
        $.each(datos, function (index, value) {
            $('#provincia').append('<option value='+value.id+'>'+value.nombre+'</option>');
        });
       
    });
});
//buscar una provincia presionando una opción de la lista de departamentos
$('#provincia').change(function(){
    ProvinciaSeleccionado=$(this).val();
         $.get('distrito/'+ProvinciaSeleccionado+'/buscar',function(datos){
         $('#distrito').empty();
         $('#distrito').append('<option value="">Seleccionar</option>')
         $.each(datos,function(index,value){
            $('#distrito').append('<option value='+value.id+'>'+value.nombre+'</option>')
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