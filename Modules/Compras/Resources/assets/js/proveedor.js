$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

var table= $('#tabla_clientes').DataTable({
    processing: true,
    serverSide: true,
    ajax: "proveedores",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'nombres', name: 'nombres'},
        {data: 'tipo_documento', name: 'tipo_documento'},
        {data: 'numero_documento', name: 'numero_documento'},
        {data: 'direccion', name: 'direccion'},
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
    $('#error_tipo_documento').hide();
    $('#error_numero_documento').hide();
    $('#error_nombres').hide();
    $('#modalcrearproveedor').modal('show');
   
   
}

//Select dinámico Departamento,Provincia,Distrito
//buscar una provincia presionando una opción de la lista de departamentos
$('#departamento').change(function(){
    DepartamentoSeleccionado=$(this).val();
   
    $.get('provincia/'+DepartamentoSeleccionado+'/buscar',function(datos){
        $('#provincia').empty();
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
         $.each(datos,function(index,value){
            $('#distrito').append('<option value='+value.id+'>'+value.nombre+'</option>')
         });
    });
});
//CREAR 
$('#btn_cliente').click(function(e){
 e.preventDefault();
 $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Creando...');

 $.ajax({
  data:$('#formulario_cliente').serialize(),
  url:"cliente",
  type:"POST",
  dataType:'json',
  success:function(){
      $('#modalcrearcliente').modal('hide');
      table.draw();
  },
  error:function(datos){
    $('#btn_cliente').html('Guardar');  
    if(datos.responseJSON.hasOwnProperty('errors')){
        //valido que tenga el error nombre
        if(datos.responseJSON.errors.nombres){
            $('#error_nombres').html('<p class="text-danger">'+datos.responseJSON.errors.nombres[0] + '</p>').show();
        }
        if(datos.responseJSON.errors.numero_documento){
            $('#error_numero_documento').html('<p class="text-danger">'+datos.responseJSON.errors.numero_documento[0] + '</p>').show(); 
        }
        if(datos.responseJSON.errors.tipo_documento){
            $('#error_tipo_documento').html('<p class="text-danger">'+datos.responseJSON.errors.tipo_documento[0] + '</p>').show();
        }
    }  
      
    
    
  }

 });
});