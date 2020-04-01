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
    ajax: "http://localhost:8000/cliente",
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

function LimpiarModal(){
    $('#btn_cliente').html('Guardar');
    $('#formulario_cliente').trigger('reset');
    $('#error_tipo_documento').hide();
    $('#error_numero_documento').hide();
    $('#error_nombres').hide();
    $('#error_direccion').hide();
    $('#error_telefono').hide();
    $('#error_email').hide();
}

$('#btn_cliente').click(function(e){
 e.preventDefault();
 $(this).html(' <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>\n'+'Creando...');

 $.ajax({
  data:$('#formulario_cliente').serialize(),
  url:"http://localhost:8000/cliente",
  type:"POST",
  dataType:'json',
  success:function(){
      $('#modalcrearcliente').modal('hide');
      table.draw();
  },
  error:function(datos){
      
  }

 });
});