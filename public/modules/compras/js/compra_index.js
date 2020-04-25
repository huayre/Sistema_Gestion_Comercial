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
        {data: 'proveedor', name: 'proveedor'},        
        {data: 'action', name: 'action', orderable: false, searchable: false},
    ],

    language: {
        search: '<span class="text-info"><i class="fas fa-search"></i></span> _INPUT_',
        lengthMenu: '<span>Ver:</span> _MENU_',
        emptyTable: "No existen registros",
        sZeroRecords:    "No se encontraron resultados",
        sInfoEmpty:      "No existen registros que contabilizar",
        sInfoFiltered:   "(filtrado de un total de _MAX_ registros)",
        sInfo:           "Mostrando del registro _START_ al _END_ de un total de _TOTAL_ datos",
        paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' },
        processing: '<div class="spinner-border " style="color:#0000FF" role="status"><span class="sr-only"></span></div>'
    },
    rowCallback:function(row,data){      
      if(data[0]!=""){
        $valor=$($(row).find("td")[0]).html();
        $($(row).find("td")[0]).text('');
        $($(row).find("td")[0]).append('<span class="badge badge-pill badge-info">'+$valor+'</span>');        
      }
      if(data[4]!=""){
          $($(row).find("td")[4]).addClass("table-info");
          
      }
      if(data[5]!=""){
        $($(row).find("td")[5]).addClass("table-warning");
        
    }
    }
    
    
});