@extends('layouts.app')

@section('content')
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Fechas</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{asset('vales/css/index.css')}}">
<link rel="stylesheet" href="{{asset('vales/js/app.js')}}">
<script src="{{asset('vales/js/app.js')}}"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script>
$(function () {
$("#datepicker").datepicker();
});
</script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body style="background-color: rgb(0, 45, 95)">

<!-- Modal 
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              ...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
          </div>
        </div>
      </div>-->
      <div class=" todo col p-md-5"></div>
      <div class="container p-3" style="width: 1000px">
          <div class="card">
              <div class="card-header">
                  <h2 class="text-center">CALACOTO - GENERAR VALES <i class="fas fa-check-circle"></i></h2>
              </div>
              <div class="body2 p-3">
                  <div class="container2">
                        <!--<div class="row height d-flex justifi-content-center align-items-center"> -->
                            <form  id="form" method="POST" action="{{ route('vale.store')   }}" novalidate>
                                @csrf
                                <div class="form-group d-flex">
                                    <div class="form-group col-sm-4">
                                        <label for="empresa">Empresa</label>
                                        <select name="empresa" 
                                                class="js-example-basic-single form-control @error('empresa')
                                                    is-invalid
                                                @enderror"
                                                id="empresa"
                                        >
                                              <option value="">Seleccione</option>
                                        @foreach ($empresa as $empresa)
                                              <option 
                                              value="{{ $empresa->id }}"
                                              {{ old('empresa')== $empresa->id ? 'selected' : '' }}
                                              >{{$empresa->nombre}}
                                            </option>
                                        @endforeach
                                        </select>
                                        @error('empresa')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>     
                               <div class="imput-group col-sm-4 ">
                                  <label for="date">Fecha de emisión</label>
                                  <div class="input-group date" id="date">
                                  <input  type="date" 
                                          name="fecha"
                                          class="form-control @error('date')
                                              is-invaled
                                          @enderror"
                                          id="fecha"  
                                          placeholder="DD/MM/YYYY"
                                          value={{old('date')}}
                                          >
                                          @error('date')
                                          <span class="input-group-append"> 
                                          </span>
                                          <span class="invalid-feedback d-block input-group-text" role="alert">
                                            <i class="fa fa-calendar"></i>
                                              <strong>{{$message}}</strong>
                                          </span>
                                          @enderror
                                  </div>       
                              </div>
                              <div class="imput-group col-sm-4 ">
                                <label for="date">Fecha de caducidad</label>
                                <div class="input-group date" id="datecc">
                                <input  type="date" 
                                        name="fechacc"
                                        class="form-control @error('date')
                                            is-invaled
                                        @enderror"
                                        id="fechacc"  
                                        placeholder="DD/MM/YYYY"
                                        value={{old('date')}}
                                        >
                                      
                                      </span>
                                        @error('date')
                                        <span class="input-group-append"> 
                                        </span>
                                        <span class="invalid-feedback d-block input-group-text" role="alert">
                                          <i class="fa fa-calendar"></i>
                                            <strong>{{$message}}</strong>
                                        </span>
                                        @enderror
                                </div>       
                            </div>
                              </div>
                              <div class="form-group d-flex">
                              <div class="form-group col-sm-3">
                                  <label for="novales">Nro. Vales</label>
                                  <input type="integer"
                                         name="novales"
                                         step="0.0001"
                                         oninput="mejorada()"
                                         class="form-control @error('novales')
                                          is-invalid
                                         @enderror"
                                         id="novales"
                                         placeholder="Cantidad"
                                         value={{old('novales')}} 
                                  >
                                  @error('novales')
                                      <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group col-sm-4">
                                  <label for="desde">Nro. Desde</label>
                                  <input type="integer"
                                         name="desde"
                                         step="0.0001"
                                         oninput="mejorada()"
                                         class="form-control @error('desde')
                                          is-invalid
                                         @enderror"
                                         id="desde"
                                         placeholder="Introduzca N°"
                                         readonly
                                         value= {{$vales+1}}
                                  >
                                  @error('desde')
                                      <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                  @enderror
                              </div>
                              <div class="form-group col-sm-4">
                                <label for="hasta">Nro. Hasta</label>
                                <input type="integer"
                                       name="hasta"
                                       step="0.0001"
                                       class="form-control @error('hasta')
                                        is-invalid
                                       @enderror"
                                       id="hasta"
                                       placeholder="Introduzca N°"
                                       readonly 
                                       value={{$vales}}
                                >
                                @error('hasta')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group d-flex">
                            <div class="form-group col-sm-4">
                              <label for="importeuni">Bs. (x Vale)</label>
                              <input type="numeric"
                                     name="importeuni"
                                     class="form-control @error('importeuni')
                                      is-invalid
                                     @enderror"
                                     id="importeuni"
                                     placeholder="Bs"
                                     value={{old('importeuni')}} 
                              >
                              @error('importeuni')
                                  <span class="invalid-feedback d-block" role="alert">
                                      <strong>{{$message}}</strong>
                                  </span>
                              @enderror
                          </div>
                          <div class="form-group col-sm-4">
                            <label for="item">Item</label>
                            <input type="integer"
                                         name="item"
                                         class="form-control @error('prelitro')
                                          is-invalid
                                         @enderror"
                                         id="item"
                                         placeholder="Gasolina Especial Plus"
                                         value="13"
                                         readonly>
                                  @error('item')
                                      <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                  @enderror
                           {{-- 
                            <select name="item"
                                   class="form-control @error('item')
                                    is-invalid
                                   @enderror"
                                   id="item" 
                            >
                                <option value="">---Seleccione---</option>
                                @foreach ($item as $item )
                                    <option 
                                    value="{{ $item->id }}"
                                    {{ old('item')== $item->id ? 'selected' : ''}}
                                    >{{$item->des}}</option>
                                @endforeach
                            </select>
                            @error('item')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror--}}
                          </div>                        
                              <div class="form-group col-sm-4">
                                  <label for="prelitro">Precio X Litro</label>
                                  <input type="integer"
                                         name="prelitro"
                                         class="form-control @error('prelitro')
                                          is-invalid
                                         @enderror"
                                         id="prelitro"
                                         placeholder="Bs"
                                         value="3.74"
                                         readonly>
                                  @error('prelitro')
                                      <span class="invalid-feedback d-block" role="alert">
                                          <strong>{{$message}}</strong>
                                      </span>
                                  @enderror
                              </div>
                            </div>
                            <div class="form-group d-flex">
                            <div class="form-group col-sm-7">
                            <label for="referencia">Referencia</label>
                            <input type="text"
                                   name="referencia"
                                   class="form-control @error('referencia')
                                    is-invalid
                                   @enderror"
                                   id="referencia"
                                   placeholder="Valido por un Mes"
                                   default="Valido por un Mes"
                            >
                            @error('referencia')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror 
                        </div>
                        <div class="form-group d-flex col-sm-5">
                            <label for="success"></label>
                            <input type="submit" class="btn btn-outline-success" value="GENERAR">
                        </div>
                        </div>
                        </form>
                        <!--Aqui van los botones -->
                            <div class="form-group d-flex p-md-3">
                                <div class="form-group col-sm-4" style="margin-right:10px">
                                    <input type="submit" class="btn btn-outline-primary" value="OBSERVAR VALES" onclick="location.href = '{{ route('vale.lotes') }}'"/>
                                </div>
                                <div class="form-group col-sm-4">
                                    <input type="submit" class="btn btn-outline-danger" value="CANCELAR" onclick="clearForm()"/>
                                </div> 
                            </div>
                        <!--Hasta aqui-->
                          </div>    
                      </div>
                  </div>
              </div>
          </div>
      </div>



<script>
    function clearForm() {
document.getElementById("form").reset();
}
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
</body>

</html>
@endsection