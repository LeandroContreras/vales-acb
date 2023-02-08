<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cheques</title>
</head>
<style>
    body {
        font-family: Roboto, Helvetica, Arial, sans-serif;
    }
    .container{
        display: block;
        width: 100%;
        height: 200px;
        box-sizing: border-box;
        border: solid;
        text-align: center;
        align-items: center;
        justify-content: center;
    }
    #talon1{
        border: solid; 
        text-align:center;
        justify-content: center;
        border-radius:7px;
        width: 200px;
        height: 50px;
        display: flex;
        align-items: center;
        font-weight: bold;
    }
    #padre{
        height: 50px;
        margin: 0;
        display: flex;
        flex-direction: column; 
        justify-content: center;
    }
    #tio{
        margin:0;
        display: flex;
    }
    #sobrina{
        width: 70px;
        background-color:rgba(226, 181, 33, 0.781);
        border-radius: 5px; 
        text-align: center;
    }
    #sobrinito{
        background-color: rgba(226, 181, 33, 0.781);
        border-radius: 5px; 
        text-align: center;

    }
    #padreX{
        height: 35px;
        margin: 0;
        display: flex;
        flex-direction: column; 
        justify-content: center;
        width: 150px;
    }
    #hijoX{
        border-radius:5px;
        margin-top: 0;
        text-align: center;
        background-color: rgba(226, 181, 33, 0.781); 
        position: relative;
        font-size: 11pt;
    }
    #hijaX{
        margin: 0;
        padding: 0;
        border-radius:5px;
        font-size: 12pt;
        text-align: center;
        font-weight: bold;
    }
    #hijo{
        border-radius:5px;
        margin-top: 0;
        text-align: center;
        background-color: rgba(226, 181, 33, 0.781); 
        position: relative;
        font-size: 11pt;
    }
    #hija{
        margin: 0;
        padding: 0;
        border-radius:5px;
        font-size: 10pt;
    }
    #abuelita{
        height: 40px;
        margin: 0;
        display: flex;
        flex-direction: column; 
        justify-content: center;
        width: 65px;
    }
    #nieta{
        margin-top: 0;
        text-align: center;
        font-size: 11pt;
    }
    #abuelo{

    }
</style>
<body>
    @for ($i=$vale->desdeax  ; $i <= $vale->desdeay; $i++)    
    <table style="border:solid; border-radius:7px; border-style:dashed">   
        <tr>
          <th><table style="border-collapse: collaspse; border-spacing: 0px 0px;">
            <tr>
                <th style="padding-right:30px;">
                    <div id="padreX">
                        <div id="hijaX">ACB</div>
                        <div id="hijoX" style="font-size: 13px">CALACOTO</div>
                    </div>
                </th>
                <td style="padding-right:30px;">
                    <div id="padreX">
                        <div id="hijaX">ACB</div>
                        <div id="hijoX" style="font-size: 13px">CALACOTO</div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div id="abuelo">Gas. ESPECIAL</div>
                </td>
                <td>
                    <div id="abuelo">Gas. ESPECIAL</div>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrino">Vale Nº</div>
                            </td>
                            <td style="padding-left:15px">
                                <div id="sobrina" style="font-size:13px">{{$i}}</div>
                            </td>
                            <td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrino">Vale Nº</div>
                            </td>
                            <td style="padding-left:15px">
                                <div id="sobrina" style="font-size:13px">{{$i}}</div>
                            </td>
                            <td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrino">Empresa</div>
                            </td>
                            <td style="padding-left:5px;">
                                <div id="sobrina" style="font-size:12px">{{$vale->empresa->abrev}}</div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrino">Empresa</div>
                            </td>
                            <td style="padding-left:5px; font-size:13px;">
                                <div id="sobrina" style="font-size:12px">{{$vale->empresa->abrev}}</div>
                            </td>
                        </tr>   
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrino">Litros</div>
                            </td>
                            <td style="padding-left:30px">
                                <div id="sobrina" style="font-size:13px">{{ number_format($vale->litros / $vale->novales, 2) }}</div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrino">Litros</div>
                            </td>
                            <td style="padding-left:30px">
                                <div id="sobrina" style="font-size:13px">{{ number_format($vale->litros / $vale->novales, 2) }}</div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrino">Precio</div>
                            </td>
                            <td style="padding-left:25px">
                                <div id="sobrina" style="font-size:13px">{{$vale->prelitro}}</div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrino">Precio</div>
                            </td>
                            <td style="padding-left:25px">
                                <div id="sobrina" style="font-size:13px">{{$vale->prelitro}}</div>
                            </td>
                            <td>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrino">Importe</div>
                            </td>
                            <td style="padding-left:15px">
                                <div id="sobrina" style="font-size:13px">{{number_format($vale->importetot / $vale->novales, 2)}}</div>
                            </td>
                            <td>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrino">Importe</div>
                            </td>
                            <td style="padding-left:15px">
                                <div id="sobrina" style="font-size:13px">{{number_format($vale->importetot / $vale->novales, 2)}}</div>
                            </td>
                            <td>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrinita" style="font-size:13px">Emisón</div>
                                <div id="sobrinita" style="font-size:13px">Vence</div>
                            </td>
                            <td style="padding-left: 30px ">
                                <div id="sobrinito" style="font-size:13px">{{$vale->fecha}}</div>
                                <div id="sobrinito" style="font-size:13px">{{$vale->fechacc}}</div>
                            </td>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrinita" style="font-size:13px">Emisón</div>
                                <div id="sobrinita" style="font-size:13px">Vence</div>
                            </td>
                            <td style="padding-left: 30px ">
                                <div id="sobrinito" style="font-size:13px">{{$vale->fecha}}</div>
                                <div id="sobrinito" style="font-size:13px">{{$vale->fechacc}}</div>
                            </td>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrino">Lote</div>
                            </td>
                            <td style="padding-left:40px">
                                <div id="sobrina" style="font-size:11px">{{$vale->empresa_id}}-{{$vale->desde}}-{{$vale->item_id}}</div>
                                <div id="sobrina" style="font-size:11px">{{$vale->empresa_id}}-{{$vale->hasta}}-{{$vale->item_id}}</div>
                            </td>
                            <td>
                    </table>
                </td>
                <td>
                    <table>
                        <tr>
                            <td>
                                <div id="sobrino">Lote</div>
                            </td>
                            <td style="padding-left:40px">
                                <div id="sobrina" style="font-size:11px">{{$vale->empresa_id}}-{{$vale->desde}}-{{$vale->item_id}}</div>
                                <div id="sobrina" style="font-size:11px">{{$vale->empresa_id}}-{{$vale->hasta}}-{{$vale->item_id}}</div>
                            </td>
                            <td>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <div style="text-align: center; border:solid; width: 120px; border-radius: 7px; transform:translateX(15px)">
                        Talon ACB
                    </div>
                </td>
                <td>
                    <div style="text-align: center; border:solid; width: 120px; border-radius: 7px; transform:translateX(15px)">
                        Talon Cliente
                    </div>
                </td>
            </tr>
        </table></th>
          <th>
            <table>
                <tr>
                    <td>
                        <div id="padre">
                            <div id="hija">AUTOMOVIL CLUB BOLIVIANO</div>
                            <div id="hijo"style="font-size: 13px">CALACOTO</div>
                            </div>
                    </td>
                    <td>
                        <div id="talon1">
                            Gasolina <br> ESPECIAL
                            </div>
                    </td>
                </tr>
                <tr style="border: solid;">
                    <td style="width: 75%">
                        <div id="abuela">
                            <div id="nieta">Empresa</div>
                            <div id="hijoX" style="font-size: 12px">{{$vale->empresa->abrev}}</div>
                        </div>
                    </td>
                    <td style="width: 25%">
                        <div id="abuela">
                            <div id="nieta">Vale Nº</div>
                            <div id="hijoX">{{$vale->empresa_id}}-{{$i}}-{{$vale->item_id}}</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table>
                            <tr>
                                <td>
                                    <div id="abuelita">
                                        <div id="nieta">Litros</div>
                                        <div id="hijoX">{{ number_format($vale->litros / $vale->novales, 2) }}</div>
                                    </div>
                                </td>
                                <td>
                                    <div id="abuelita">
                                        <div id="nieta">Precio</div>
                                        <div id="hijoX">{{$vale->prelitro}}</div>
                                    </div>
                                </td>
                            </tr>    
                        </table>
                    </td>
                    <td>
                        <div id="abuela">
                            <div id="nieta">Total bs</div>
                            <div id="hijoX">{{number_format($vale->importetot / $vale->novales, 2)}}</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div id="Ref" style="border:solid; height: 20px; border-radius:7px; text-align:center">
                            {{$vale->obs}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="abuela">
                            <div id="nieta">Emision</div>
                            <div id="hijoX">{{$vale->fecha}}</div>
                            <div id="nieta">Caducidad</div>
                            <div id="hijoX">{{$vale->fechacc}}</div>
                        </div>
                    </td>
                    <td rowspan="2">
                        <div style="border:solid; height:100px; border-radius:7px; display:flex; text-align:center; ">
                            Autorizado por:
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="abuela">
                            <div id="nieta" style="height:13px; font-size:12px">Lote</div>
                            <div id="hijoX">{{$vale->empresa_id}}-{{$vale->desde}}-{{$vale->item_id}}</div>
                            <div id="hijoX">{{$vale->empresa_id}}-{{$vale->hasta}}-{{$vale->item_id}}</div>
                        </div>
                    </td>
                </tr>
            </table>
          </th>
        </tr>
        <tr>
      </table> 
      @endfor
    </body>
</html>