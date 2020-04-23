$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function OcultarMensajesErrorModal(){
    //Ocultamos todos los mensages de error
    $('#error_item_producto').hide()
    $('#error_item_cantidad').hide();
    $('#error_item_precio').hide();
}
function IniciarModal(){
     OcultarMensajesErrorModal();
    //reseteamos imput del modal
    $('#item_producto').val("Seleccionar");
    $('#item_cantidad').val("");
    $('#item_precio').val("");
    //abrir modal
    $('#modal_agregar_productos_compra').modal('show');
}

//intruccion que se ejecuta cuando presionamos el boto AGREGAR LISTA del modal

$('#btn_agregar_item_producto').click(function(){
     OcultarMensajesErrorModal();
     id_producto=$('#item_producto').val();
     nombre_producto=$('#item_producto option:selected').text();
     cantidad_compra_producto=$('#item_cantidad').val();
     precio_producto_unidad=$('#item_precio').val();
     //validados si no existe ningun error en los imput del modal
     if(!ValidarCamposModalAgregarProductos(nombre_producto,cantidad_compra_producto,precio_producto_unidad)){
         //llamamos a la funcion para mostrar en  la vista
        AgregarItemLista(id_producto,nombre_producto,cantidad_compra_producto,precio_producto_unidad)
        
        $('#modal_agregar_productos_compra').modal('hide');
     }


    
     
     
});
//funcion que permite validar los campos del array
function ValidarCamposModalAgregarProductos(nombre_producto,cantidad_producto,precio_producto_unidad){
    error=false;
    if((nombre_producto=="Seleccionar")){
        $('#error_item_producto').html('<p class="text-danger">Seleccione el producto</p>').show();
        $('#modal_agregar_productos_compra').modal('show');
        error=true;
    }
    if(cantidad_producto==""){
         $('#error_item_cantidad').html('<p class="text-danger">Ingrese la cantidad comprado</p>').show();
        $('#modal_agregar_productos_compra').modal('show');
        error=true;
    }
    if(precio_producto_unidad==""){
         $('#error_item_precio').html('<p class="text-danger">Ingrese el precio del producto</p>').show();
        $('#modal_agregar_productos_compra').modal('show');
        error=true;
    }

    return error;
}

//funcion que nos permite agregar un producto en la lista de a vista
var contador=0;
var Compra_Total=0;
var Sub_Total=[];
function AgregarItemLista(id_producto,nombre_producto,cantidad_compra_producto,precio_producto_unidad){    
    Sub_Total[contador]=(cantidad_compra_producto*precio_producto_unidad);
    Compra_Total=Compra_Total+Sub_Total[contador];
    
    var fila='<tr id="item'+contador+'"><td>'+contador+'</td><td><input type="hidden" name="ArrayIdProducto[]" value="'+id_producto+'">'+nombre_producto+'</td><td><input type="hidden" name="ArrayCantidadCompraProducto[]" value="'+cantidad_compra_producto+'">'+cantidad_compra_producto+'</td><td><input type="hidden" name="ArrayPrecioProductoUnidad[]" value="'+precio_producto_unidad+'">'+precio_producto_unidad+'</td><td></td><td>'+Sub_Total[contador]+'</td><td><button class="text-danger btn btn-light" onclick="EliminarItemLista('+contador+')"><i class="fa fa-trash"></i></button></td></tr>';
    $('#total').html('S/ '+Compra_Total);
    $('#detalles_compra').append(fila);
    contador++;     
        
}
//funcion que permite eliminar un producto agregado en la lista de la vista 
function EliminarItemLista(contador){
    Compra_Total=Compra_Total-Sub_Total[contador];
    $('#total').html('S/ '+Compra_Total);
    $('#item'+contador).remove();
    

}

 
//CREAR  UNA NUEVA COMPRA
//para crear una compra enviamos los datos generales de la compra mediante un formulario extraerdo sus datos con serialize
//para agregar los detalles de la venta se envia un array que contiene el [id_producto,nombre_producto,precio_producto_unidad]
$('#btn_registrar_compra').click(function(e){
 e.preventDefault();
 $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Creando...');
 var ArrayIdProducto = $("input[name='ArrayIdProducto[]']").map(function(){return $(this).val();}).get();
 var ArrayCantidadCompraProducto = $("input[name='ArrayCantidadCompraProducto[]']").map(function(){return $(this).val();}).get();
 var ArrayPrecioProductoUnidad=$("input[name='ArrayPrecioProductoUnidad[]']").map(function(){return $(this).val();}).get();
 var datos = {
   'ArrayIdProducto':ArrayIdProducto,
   'ArrayCantidadCompraProducto':ArrayCantidadCompraProducto,
   'ArrayPrecioProductoUnidad':ArrayPrecioProductoUnidad,
   'tipo_comprobante':$('#tipo_comprobante').val(),
   'serie_comprobante':$('#serie_comprobante').val(),
   'numero_comprobante':$('#numero_comprobante').val(),
   'fecha_compra':$('#fecha_compra').val(),
   'proveedor_id':$('#proveedor_id').val()
 }

 $.ajax({
  data:datos, 
  url:url_global+'/compra',
  type:"POST",
  dataType:'json',
  success:function(result){
     
  },
  error:function(datos){     
    
    
  }

 });
});
