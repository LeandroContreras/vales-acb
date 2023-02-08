<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Vale</title>
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" href="{{asset('vales/css/pdf.css')}}">
</head>
<body>
    <div class="container col-7 p-md-5">
        <div class="card">
        <div class="d-flex">
            <div id="padre"class="col-3" >
            <h3 style="text-align: center">ACB</h3>
            <div id="hijo" class="justify-content-center col-6" style="background-color: rgba(226, 181, 33, 0.781)">
                <p style="text-align: center">CALACOTO</p>
            </div>
            <h5 style="text-align: center">Gas. ESPECIAL</h5>
            <div class="d-flex">
                <div class="col-6">
                    <p>Vale Nº</p>
                    <p>Empresa</p>
                    <p>Litros</p>
                    <p>Precio</p>
                    <p>Importe</p>
                    <p>Emision</p>
                    <p>Lote</p>
                </div>
                <div id="info" class="col-6">
                    <p>{{$vale->id}}</p>
                    <p>{{$vale->empresa->nombre}}</p>
                    <p>{{$vale->litros}}</p>
                    <p>{{$vale->prelitro}}</p>
                    <p>{{$vale->importetot}}</p>
                    <p>{{$vale->fecha}}</p>
                    <p>{{$vale->desde}}-{{$vale->hasta}}</p>
                </div>
            </div>
            <label for=""></label>
                <div id="talon" class="col-7" style="border-style: solid">
                <h6 style="text-align: center">Talon CLIENTE</h6>
                </div>
            <label for=""></label>
            </div>
            <div id="padre"class="col-3">
                <h3 style="text-align: center">ACB</h3>
                <div id="hijo" class="justify-content-center col-6" style="background-color: rgba(226, 181, 33, 0.781)">
                    <p style="text-align: center">CALACOTO</p>
                </div>
                <h5 style="text-align: center">Gas. ESPECIAL</h5>
                <div class="d-flex">
                    <div class="col-6">
                        <p>Vale Nº</p>
                        <p>Empresa</p>
                        <p>Litros</p>
                        <p>Precio</p>
                        <p>Importe</p>
                        <p>Emision</p>
                        <p>Lote</p>
                    </div>
                    <div id="info" class="col-6">
                        <p>{{$vale->id}}</p>
                        <p>{{$vale->empresa->nombre}}</p>
                        <p>{{$vale->litros}}</p>
                        <p>{{$vale->prelitro}}</p>
                        <p>{{$vale->importetot}}</p>
                        <p>{{$vale->fecha}}</p>
                        <p>{{$vale->desde}}-{{$vale->hasta}}</p>
                    </div>
                </div>
                <label for=""></label>
                    <div id="talon" class="col-7" style="border-style: solid">
                    <h6 style="text-align: center">Talon ACB</h6>
                    </div>
                <label for=""></label>
                </div>
                <div class="col-6">
                    <div class="d-flex">
                    <div class="col-7">
                    <h6 class="p-md-2">AUTOMOVIL CLUB BOLIVIANO</h6>
                    <div id="otrohijo"class="justify-content-center col-6" style="background-color: rgba(226, 181, 33, 0.781)">
                        <p style="text-align: center">CALACOTO</p>
                    </div>
                    </div>
                    <div id="talon2"  style="border-style: solid">
                        <h6 style="text-align: center ">Gasolina ESPECIAL</h6>
                    </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-6">
                            <p>Empresa</p>
                            <div id="nieto1"  style="background-color: rgba(226, 181, 33, 0.781)">
                                <p style="text-align: center">{{$vale->empresa->nombre}}</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <p>Vale Nº </p>
                            <div id="nieto1"  style="background-color: rgba(226, 181, 33, 0.781)">
                                <p style="text-align: center">{{$vale->novales}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="col-4" id="tio1">
                            <p>Litros</p>
                            <div id="nieto2"  style="background-color: rgba(226, 181, 33, 0.781)">
                                <p style="text-align: center">{{$vale->litros}}</p>
                            </div>
                        </div>
                        <div class="col-4" id="tio1">
                            <p>Precio</p>
                            <div id="nieto2"  style="background-color: rgba(226, 181, 33, 0.781)">
                                <p style="text-align: center">{{$vale->prelitro}}</p>
                            </div>
                        </div>
                        <div class="col-4" id="tio1">
                            <p>Total Bs</p>
                            <div id="nieto2"  style="background-color: rgba(226, 181, 33, 0.781)">
                                <p style="text-align: center">{{$vale->importeuni}}</p>
                            </div>
                        </div>
                    </div>
                    <div id="modo" style="border-style: solid">
                        <!--AQUI VAMOS A PREGUNTAR CON QUE LLENAR-->
                    </div>
                    <div class="d-flex">
                        <div>
                            <div id="tio2" class="col-6">
                                <p>Emisión</p>
                                <div id="nieto3"  style="background-color: rgba(226, 181, 33, 0.781)">
                                    <p style="text-align: center">{{$vale->fecha}}</p>
                                </div>
                            </div>
                            <div id="tio3" class="col-6">
                                <p>Lote</p>
                                <div id="nieto4"  style="background-color: rgba(226, 181, 33, 0.781)">
                                    <p style="text-align: center">{{$vale->desde}}-{{$vale->hasta}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-7" id="modo1" style="border-style: solid">
                            <!--AQUI VAMOS A PREGUNTAR CON QUE LLENAR-->
                        </div>
                    </div>
                </div>
               
        </div>
    </div> 
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</html>