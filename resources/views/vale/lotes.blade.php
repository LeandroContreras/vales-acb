@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vales por Lotes</title>
   
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
	background:  rgb(0,45,90); 
	color:white;
	}
    .float-left {
    float: left;
    }

    .clearfix::after {
    content: "";
    clear: both;
    display: table;
    }

    </style>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col">
            <table id="example" class="table table-bordered  display nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr>

                        <th>EMPRESA</th>
                        <th>CANTIDAD</th>
                        <th>LOTE</th>
                        <th>FECHA INI</th>
                        <th>FECHA FIN</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vales as $val)
                        <tr>
                            <td>{{ $val->empresa->abrev }}</td>
                            <td>{{ $val->novales }}</td>
                            <td>{{ $val->id }}</td>
                            <td>{{ $val->fecha }}</td>
                            <td>{{ $val->fechacc}}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary" onclick="location.href = '{{ route('vale.show', $val->id) }}'">Ver Comprobante</button>
                                <button type="button" class="btn btn-outline-info" onclick="location.href = '{{route('vale.pdf', $val->id)}}'">PDF Comprobante</button>
                                <button type="button" class="btn btn-outline-warning" onclick="location.href = '{{route('vale.cheque', $val->id)}}'">Ver cheque</button>
                            
                                <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#exampleModalCenter{{$val->id}}">PDF</button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document" style="width: 600px; height: 400px;">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Vales PDF</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        @php
                                          $count = 1;
                                        @endphp
                                        @switch($val->novales)
                                          @case($val->novales<=30)
                                          <div class="float-left" style="margin: 5px;">
                                            <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale1', $val->id)}}'">PDF VALE 1</button>
                                          </div>
                                            @break
                                            @case($val->novales<=60)
                                            <div class="float-left" style="margin: 5px;">
                                              <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale1', $val->id)}}'">PDFVALE 1</button>
                                            </div>
                                            <div class="float-left" style="margin: 5px;">
                                              <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale2', $val->id)}}'">PDF VALE 2</button>
                                            </div>
                                              @break
                                              @case($val->novales<=90)
                                              <div class="float-left" style="margin: 5px;">
                                                <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale1', $val->id)}}'">PDF VALE 1</button>
                                              </div>
                                              <div class="float-left" style="margin: 5px;">
                                                <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale2', $val->id)}}'">PDF VALE 2</button>
                                              </div>
                                              <div class="float-left" style="margin: 5px;">
                                                <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale3', $val->id)}}'">PDF VALE 3</button>
                                              </div>
                                                @break
                                              @case($val->novales<=120)
                                              <div class="float-left" style="margin: 5px;">
                                                <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale1', $val->id)}}'">PDF VALE 1</button>
                                              </div>
                                              <div class="float-left" style="margin: 5px;">
                                                <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale2', $val->id)}}'">PDF VALE 2</button>
                                              </div>
                                              <div class="float-left" style="margin: 5px;">
                                                <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale3', $val->id)}}'">PDF VALE 3</button>
                                              </div>
                                              <div class="float-left" style="margin: 5px;">
                                                <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale4', $val->id)}}'">PDF VALE 4</button>
                                              </div>
                                                @break
                                                @case($val->novales<=150)
                                                <div class="float-left" style="margin: 5px;">
                                                  <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale1', $val->id)}}'">PDF VALE 1</button>
                                                </div>
                                                <div class="float-left" style="margin: 5px;">
                                                  <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale2', $val->id)}}'">PDF VALE 2</button>
                                                </div>
                                                <div class="float-left" style="margin: 5px;">
                                                  <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale3', $val->id)}}'">PDF VALE 3</button>
                                                </div>
                                                <div class="float-left" style="margin: 5px;">
                                                  <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale4', $val->id)}}'">PDF VALE 4</button>
                                                </div>
                                                <div class="float-left" style="margin: 5px;">
                                                  <button type="button"  class="btn btn-outline-danger" onclick="location.href = '{{route('vale.pdfvale5', $val->id)}}'">PDF VALE 5</button>
                                                </div>
                                                  @break
                                              
                                          @default
                                            
                                        @endswitch
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>               
            </table>
            <div class="botones py-3 ">
                <button type="button" class="btn btn-outline-primary " onclick="location.href = '{{ route('vale.create') }}'">CREAR VALE</button>
                <button type="button" class="btn btn-outline-success" onclick="location.href= '{{ route('vale.index')}}'">LISTADO GENERAL</button>
            </div>           
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Mensaje</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p id="modal-text">Aquí va el mensaje</p>
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
        $('#example').DataTable({        
                columnDefs:[{
                    searchPanes:{
                        show:true
                    },
                    targets:[4]
                }
                ],
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

</body>
</html>
@endsection