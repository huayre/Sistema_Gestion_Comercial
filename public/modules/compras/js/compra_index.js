$('#tabla_compras').DataTable({
    processing: true,
    serverSide: true,
    ajax: "compra",
    columns: [
        {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        {data: 'tipo_comprobante', name: 'tipo_comprobante'},
        {data: 'serie_comprobante', name: 'serie_comprobante'},
        {data: 'fecha_compra', name: 'fecha_compra'},
        {data: 'precio_compra', name: 'precio_compra'},        
        {data: 'detalle_compra', name: 'detalle_compra'},        
        {data: 'proveedor_id', name: 'proveedor_id'},        
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
    columnDefs:
        {"className": "dt-center", "targets": "_all"},
    
    rowCallback:function(row,data){      
      if(data[0]!=""){
        $valor=$($(row).find("td")[0]).html();
        $($(row).find("td")[0]).text('');
        $($(row).find("td")[0]).append('<span class="badge badge-pill badge-dark">'+$valor+'</span>');        
      }
      if(data[4]!=""){
          $($(row).find("td")[4]).addClass("table-info");
          
      }
    }

    
});