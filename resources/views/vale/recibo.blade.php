<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Generando PDF</title>
    <link rel="stylesheet" href="{{public_path('bootstrap-4.4/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container col-6  p-md-5">
        <div class="card">
            <div class="card-header justifi-content-center">
                <h3 class="card-title text-center">REPORTE DE VALE</h3>
            <div>
        </div>
    </div>
    <div class="card">
    <div class="container2 md-5 p-7">
        <h6>AUTOMOVIL CLUB BOLIVIANO</h6>
        <P>Depto. Contabilidad</P>
        <h6>EMISION DE VALES DE GASOLINA: Gas. CALACOTO</h6>
        <p>==============================================================================</p>
        <div class="container3">
        <table id="vales" class="table table-condensed" cellspacing="15">
            <thead>
                <tr>
                    <th scope="col">Empresa</th>
                    <th scope="col">No. Vales</th>
                    <th scope="col">Importe x vale</th>
                    <th scope="col">Tipo Gasolina</th>
                    <th scope="col">Fact Global</th>
                    <th scope="col">Fecha Emision</th>
                    <th scope="col">Lote</th>
                    <th scope="col">Sub Total Bolivianos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">{{$vale->empresa->abrev}}</th>
                    <td>&nbsp;{{$vale->novales}}</td>
                    <td>&nbsp;{{$vale->importeuni}}</td>
                    <td>&nbsp;{{$vale->item->des}}</td>
                    <td>&nbsp;{{$vale->obs}}</td>
                    <td width="80">&nbsp;{{$vale->fecha}}</td>
                    <td width="50">&nbsp;{{$vale->desde}}-{{$vale->hasta}}</td>
                    <td>&nbsp;{{$vale->importetot}}</td>
                </tr>
            </tbody>
        </table>
        <P>Fecha de Proceso: {{$vale->fecha}}
        <p>Oficina de Informática</p>
        </div>
        <!--{{$vale}}-->
    </div>
    </div>
    
</body>
</html>