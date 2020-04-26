<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> --}}
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    
    

</head>
<body>    
    
    
    <div class="container">
        <hr>      
            
            <table id="tabla_marcas" class="display table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Fecha de  creacion</th>
                        <th>Fecha de  Mod.</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    
    
    
    <script>
        
        $(document).ready( function () {
            $('#tabla_marcas').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'marca',
                columns: [
                    {data:'id',name:'id'},
                    { data: 'nombre',name:'nombre' },
                    { data: 'created_at',name:'created_at' },
                    { data: 'updated_at',name:'updated_at' }

                 
                ]
            });
        });
    </script>
       
</body>
</html>