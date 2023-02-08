@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    
    <!-- searchPanes -->
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/1.0.1/css/searchPanes.dataTables.min.css">
    <!-- select -->
    <link href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
    <style>
	table thead{
	background:rgb(0,45,95); 
	color:white;
	}
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col">
            <table id="tablap" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID VALE</th>
                        <th>LOTE</th>
                        <th>IMPORTE</th>
                        <th>EMPRESA</th>
                        <th>ESTADO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vales2 as $vales2 )
                        <tr>
                            <td>{{$vales2->id}}</td>
                            <td>{{$vales2->vale_id}}</td>
                            <td>{{$vales2->imp}}</td>
                            <td>{{$vales2->empresa_id}}</td>
                            <td style="font-size:1px">{{$vales2->estates}}</td>
                            <td style="width: 50px;">
                                <form  id="myForm" method="POST" action="{{ route('vale.updateVale2', $vales2->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-outline-primary">Cambiar Estado</button>
                                  </form>   
                            </td>
                        </tr>
                    @endforeach
                </tbody>                
            </table> 
            <div class="botones py-3 ">
                <button type="button" class="btn btn-outline-primary " onclick="location.href = '{{ route('vale.create') }}'">CREAR VALE</button>
                <button type="button" class="btn btn-outline-success" onclick="location.href= '{{ route('vale.lotes')}}'">ATRAS</button>
            </div>          
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  

    <!-- searchPanes   -->
    <script src="https://cdn.datatables.net/searchpanes/1.0.1/js/dataTables.searchPanes.min.js"></script>
    <!-- select -->
    <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>  
    
    <script>
 $(document).ready(function(){
        $('#tablap').DataTable({        
                columnDefs:[{
                    searchPanes:{
                        show:true
                    },
                    targets:[5]
                }
                ],
                columnDefs: [{
    targets: 4,
    createdCell: function (td, cellData, rowData, row, col) {
      if (cellData == 0) {
        $(td).css('background-color', 'red');
      } else {
        $(td).css('background-color', 'green');
      }
    }
  }],
                language: {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
  }
        });
        

    });
    </script>
    <script>
    function changeState() {
    var estates = document.getElementById('estates');
    if (derivatives.value == 0) {
      derivatives.value = 1;
    } else {
      derivatives.value = 0;
    }
    document.getElementById("myForm").submit();
  }
    </script>
</body>
</html>
@endsection