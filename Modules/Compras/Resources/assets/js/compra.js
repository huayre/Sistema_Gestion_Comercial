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
var array_detalle_compra = new Array();
$('#btn_agregar_item_producto').click(function(){
     id_producto=$('#item_producto').val();
     nombre_producto=$('#item_producto option:selected').text();
     cantidad_compra_producto=$('#item_cantidad').val();
     precio_producto_unidad=$('#item_precio').val();
     
     var objeto={"producto_id":id_producto,"cantidad_compra_producto":cantidad_compra_producto,"precio_producto_unidad": precio_producto_unidad};
     array_detalle_compra.push(objeto);

    // ValidarCamposModalAgregarProductos(nombre_producto,cantidad_producto,precio_producto_unidad)
     AgregarItemLista(nombre_producto,cantidad_compra_producto,precio_producto_unidad)
     
});



var contador=0;
var Compra_Total=0;
var Sub_Total=[];
function AgregarItemLista(nombre_producto,cantidad_compra_producto,precio_producto_unidad){    
    Sub_Total[contador]=(cantidad_compra_producto*precio_producto_unidad);
    Compra_Total=Compra_Total+Sub_Total[contador];
    
    var fila='<tr id="item'+contador+'"><td>'+(contador+1)+'</td><td>'+nombre_producto+'</td><td>'+cantidad_compra_producto+'</td><td>'+precio_producto_unidad+'</td><td></td><td>'+Sub_Total[contador]+'</td><td><button class="text-danger btn btn-light" onclick="EliminarItemLista('+contador+')"><i class="fa fa-trash"></i></button></td></tr>';
    $('#total').html('S/ '+Compra_Total);
    $('#detalles_compra').append(fila);
    contador++;     
        
}
function EliminarItemLista(contador){
    Compra_Total=Compra_Total-Sub_Total[contador];
    $('#total').html('S/ '+Compra_Total);
    $('#item'+contador).remove();

}

 function motrararray(){
     for(i=0;i<=array_detalle_compra.length;i++){
        console.log(array_detalle_compra[i]);
     }
     console.log(JSON.stringify(array_detalle_compra));
   
}

//CREAR  UNA NUEVA COMPRA
//para crear una compra enviamos los datos generales de la compra mediante un formulario extraerdo sus datos con serialize
//para agregar los detalles de la venta se envia un array que contiene el [id_producto,nombre_producto,precio_producto_unidad]
$('#btn_registrar_compra').click(function(e){
    motrararray();
 e.preventDefault();
 $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Creando...');
    datos_detalle_compra=JSON.stringify(array_detalle_compra);
    datos_generales_compra=$('#formulario_datos_generales_compra').serialize();
 
 var datos = {
   'array_detalle_compra':array_detalle_compra,
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
