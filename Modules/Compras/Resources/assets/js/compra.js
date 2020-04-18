$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


function IniciarModal(){
    //Ocultamos todos los mensages de error
    $('#error_item_producto').hide()
    $('#error_item_cantidad').hide();
    $('#error_item_precio').hide();
    //reseteamos imput del modal
    $('#item_producto').val("");
    $('#item_cantidad').val("");
    $('#item_precio').val("");
    //abrir modal
    $('#modal_agregar_productos_compra').modal('show');
}

//intruccion que se ejecuta cuando presionamos el boto AGRAGAR LISTA del modal
$('#btn_agregar_item_producto').click(function(){
     id_producto=$('#item_producto').val();
     nombre_producto=$('#item_producto option:selected').text();
     cantidad_producto=$('#item_cantidad').val();
     precio_producto_unidad=$('#item_precio').val();

    // ValidarCamposModalAgregarProductos(nombre_producto,cantidad_producto,precio_producto_unidad)
     AgregarItemLista(nombre_producto,cantidad_producto,precio_producto_unidad)
     
     ///$('#modal_agregar_productos_compra').modal('hide');
     
});


function ValidarCamposModalAgregarProductos(nombre_producto,cantidad_producto,precio_producto_unidad){

    if(nombre_producto=="Seleccionar"){
        $('#error_item_producto').html('<p class="text-danger">Seleccione un producto</p>').show();
    }
    if(cantidad_producto==""){
        $('#error_item_cantidad').html('<p class="text-danger">Ingrese una cantidad</p>').show();
    }
    if(precio_producto_unidad==""){
        $('#error_item_precio').html('<p class="text-danger">Ingrese el precio</p>').show();
    }
}

var contador=0;
var Venta_Total=0;
var Sub_Total=[];
function AgregarItemLista(nombre_producto,cantidad_producto,precio_producto_unidad){    
    Sub_Total[contador]=(cantidad_producto*precio_producto_unidad);
    Venta_Total=Venta_Total+Sub_Total[contador];
    
    var fila='<tr id="item'+contador+'"><td>'+(contador+1)+'</td><td>'+nombre_producto+'</td><td>'+cantidad_producto+'</td><td>'+precio_producto_unidad+'</td><td></td><td>'+Sub_Total[contador]+'</td><td><button class="text-danger btn btn-light" onclick="EliminarItemLista('+contador+')"><i class="fa fa-trash"></i></button></td></tr>';
    $('#total').html('S/ '+Venta_Total);
    $('#detalles_compra').append(fila);
    contador++;     
        
}
function EliminarItemLista(contador){
    Venta_Total=Venta_Total-Sub_Total[contador];
    $('#total').html('S/ '+Venta_Total);
    $('#item'+contador).remove();

}



//CREAR  UNA NUEVA COMPRA
$('#btn_proveedor').click(function(e){
 e.preventDefault();
 $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Creando...');
 ResetearMensageError();
 $.ajax({
  data:$('#formulario_datos_generales_compra').serialize(),
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
