<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\vale;
use App\Models\Vale2;
use App\Models\Empresa;
//use Barryvdh\DomPDF\PDF;
//use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Vale as ModelsVale;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Illuminate\Contracts\View\View as ViewView;
//use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
//use Barryvdh\DomPDF\Facade as PDF;
class ValeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 //   public function __construct()
 // {
 //       $this->middleware('auth');
 //  }
 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $sql = 'SELECT * FROM vales2';
        $vales2 = DB::select($sql);
        //$vales = auth()->user()->vales;
        //return view ('vale.index');
        //$vales2=Vale2::all();
        $empresas=Empresa::all(['id', 'nombre']);
        $vales =Vale::all();
        $items=Item::all(['id','des', 'pvt']);
        return view('vale.index')
        ->with('vales', $vales)
        ->with('empresa', $empresas)
        ->with('item', $items)
        ->with('vales2', $vales2);
        //->with('vales2', $vales2);
    }
    public function editVale2($id)
    {
        $vales2 = Vale2::findOrFail($id);
        $empresas = Empresa::all(['id', 'nombre']);
        $vales = Vale::all();
        $items = Item::all(['id', 'des', 'pvt']);
        return view('vale.editVale2')
            ->with('vales2', $vales2)
            ->with('empresas', $empresas)
            ->with('vales', $vales)
            ->with('items', $items);
    }

    public function updateVale2(Request $request, $id)
    {
        $vales2 = Vale2::findOrFail($id);
        if ($vales2->estates == 0) {
        $vales2->estates = 1;
        } else {
        $vales2->estates = 0;
        }
        $vales2->save();
        return redirect()->route('vale.index')->with('success', 'Vale2 Updated Successfully');
    } 

    public function search(Request $request){
    $search = $request->q;
    $data = Empresa::where('nombre', 'LIKE', "%$search%")->get();
    return response()->json($data);
}

    public function buscarID($id)
    {
    $resultado = DB::connection('KartAcb')->select("SELECT * FROM competidors WHERE id = ?", [$id]);
    return view('vale.index',['resultado'=>$resultado]);
    }

    public function valesID()
    {
    $sql=DB::connection('pospg')->select("SELECT * FROM vlesd");
    return view('vales3.index')->with('vlesd', $sql);
    }

    public function lotes(){
        $sql = 'SELECT * FROM vales2';
        $vales2 = DB::select($sql);
        //$vales = auth()->user()->vales;
        //return view ('vale.index');
        //$vales2=Vale2::all();
        $empresas=Empresa::all(['id', 'nombre']);
        $vales =Vale::all();
        $items=Item::all(['id','des', 'pvt']);
        return view('vale.lotes')
        ->with('vales', $vales)
        ->with('empresa', $empresas)
        ->with('item', $items)
        ->with('vales2', $vales2);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Con modelos
        $vales=Vale::all()->max('hasta');
        $empresas=Empresa::all(['id', 'nombre']);
        $items=Item::all(['id', 'des', 'pvt']);
        //crea un nuevo vale con ID especifico
        /*$vale = Vale::create([
            'id' => 1,
            'empresa_id'=> 1,
            'item_id'=> 13,
            'novales' => 64619,
            'desde' => 1,
            'hasta' => 64618,
            'importeuni'=>1,
            'importetot'=>6419,
            'prelitro'=>3.47,
            'litros'=>17,277.80748663102,
            'contador'=>64618,
            'obs'=>'Vale por todo',
            'fecha'=>'2023-01-11',
            'fechacc'=>'2023-01-11',
            'user_id'=>1
        ]);*/
        //hasta aka
        return view('vale.create', compact('vales'))
        ->with('empresa', $empresas)
        ->with('item', $items); 
        //$items=Item::all(['id', 'des']);
        //return view('vale.create')->with('item', $items);
        //$vales=Vale::all();
        //return view('vale.create', compact('vales'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'empresa'=> 'required',
            'novales'=> 'required',
            'desde'=> 'required',
            'hasta'=> 'required',
            'importeuni'=> 'required',
            'prelitro'=> 'required',
            'referencia'=> 'required',
            'fecha'=> 'required',
            'fechacc'=>'required',
            'item'=> 'required',
        ]);

        // Almacenar en la BD sin modelos
        switch ($data['novales']){
            case($data['novales']<=30):
                try{
                    $total = $data['novales']*$data['importeuni'];
                    $litro =$total/$data['prelitro'];
                    $hoja1a = $data['desde'];
                    $hoja1b = $data['hasta'];
                    $id= DB::table('vales')->insertGetId([
                    'empresa_id'=>$data['empresa'],
                    'item_id'=>$data['item'],
                    'novales'=>$data['novales'],
                    'desde'=>$data['desde'],
                    'hasta'=>$data['hasta'],
                    'importeuni'=>$data['importeuni'],
                    'prelitro'=>$data['prelitro'],
                    'contador'=> $data['hasta'],
                    'importetot'=> $total,
                    'litros'=>$litro,
                    'obs'=>$data['referencia'],
                    'fecha'=>$data['fecha'],
                    'fechacc'=>$data['fechacc'],
                    'user_id'=>Auth::user()->id,
                    'desdeax'=>$hoja1a,
                    'hastaay'=>$hoja1b,
                    ]);
                    $cont=0;
                    $suma= $data['importeuni'];
                    $idv= $data['desde']-1;
                            while($cont<$data['novales'] && $idv<=$data['hasta']  ){
                                $cont ++;
                                $idv++;
                                DB::table('vales2')->insert([
                                    'id' => $idv,
                                    'vale_id'=>$id,
                                    'empresa_id'=>$data['empresa'],
                                    'imp'=>$suma]);
                                }    
            } catch (\Exception $e){}
                return redirect()->action('ValeController@create');
                break;
                case($data['novales'] > 30 && $data['novales'] <= 60):
                    try{
                        $total = $data['novales']*$data['importeuni'];
                        $litro =$total/$data['prelitro'];
                        $hoja1a = $data['desde'];
                        $hoja1b = $data['desde'] + 29;
                        $hoja2a = $data['desde'] + 30;
                        $hoja2b = $data['hasta'];
                        $id= DB::table('vales')->insertGetId([
                        'empresa_id'=>$data['empresa'],
                        'item_id'=>$data['item'],
                        'novales'=>$data['novales'],
                        'desde'=>$data['desde'],
                        'hasta'=>$data['hasta'],
                        'importeuni'=>$data['importeuni'],
                        'prelitro'=>$data['prelitro'],
                        'contador'=> $data['hasta'],
                        'importetot'=> $total,
                        'litros'=>$litro,
                        'obs'=>$data['referencia'],
                        'fecha'=>$data['fecha'],
                        'fechacc'=>$data['fechacc'],
                        'user_id'=>Auth::user()->id,
                        'desdeax'=>$hoja1a,
                        'hastaay'=>$hoja1b,
                        'desdebx'=>$hoja2a,
                        'hastaby'=>$hoja2b,
                        ]);
                        $cont=0;
                        $suma= $data['importeuni'];
                        $idv= $data['desde']-1;
                                while($cont<$data['novales'] && $idv<=$data['hasta']  ){
                                    $cont ++;
                                    $idv++;
                                    DB::table('vales2')->insert([
                                        'id' => $idv,
                                        'vale_id'=>$id,
                                        'empresa_id'=>$data['empresa'],
                                        'imp'=>$suma]);
                                    }    
                } catch (\Exception $e){}
                    return redirect()->action('ValeController@create');
                    break;
            case($data['novales'] > 60 && $data['novales'] <= 90):
                try{
                    $total = $data['novales']*$data['importeuni'];
                    $litro =$total/$data['prelitro'];
                    $hoja1a = $data['desde'];
                    $hoja1b = $data['desde'] + 29;
                    $hoja2a = $data['desde'] + 30;
                    $hoja2b = $data['desde'] + 59;
                    $hoja3a = $data['desde'] + 60;
                    $hoja3b = $data['hasta'];
                    $id= DB::table('vales')->insertGetId([
                    'empresa_id'=>$data['empresa'],
                    'item_id'=>$data['item'],
                    'novales'=>$data['novales'],
                    'desde'=>$data['desde'],
                    'hasta'=>$data['hasta'],
                    'importeuni'=>$data['importeuni'],
                    'prelitro'=>$data['prelitro'],
                    'contador'=> $data['hasta'],
                    'importetot'=> $total,
                    'litros'=>$litro,
                    'obs'=>$data['referencia'],
                    'fecha'=>$data['fecha'],
                    'fechacc'=>$data['fechacc'],
                    'user_id'=>Auth::user()->id,
                    'desdeax'=>$hoja1a,
                    'hastaay'=>$hoja1b,
                    'desdebx'=>$hoja2a,
                    'hastaby'=>$hoja2b,
                    'desdecx'=>$hoja3a,
                    'hastacy'=>$hoja3b,
                    ]);
                    $cont=0;
                    $suma= $data['importeuni'];
                    $idv= $data['desde']-1;
                            while($cont<$data['novales'] && $idv<=$data['hasta']  ){
                                $cont ++;
                                $idv++;
                                DB::table('vales2')->insert([
                                    'id' => $idv,
                                    'vale_id'=>$id,
                                    'empresa_id'=>$data['empresa'],
                                    'imp'=>$suma]);
                                }    
            } catch (\Exception $e){}
                return redirect()->action('ValeController@create');
                break;
                case($data['novales'] > 90 && $data['novales'] <=120):
                    try{
                        $total = $data['novales']*$data['importeuni'];
                        $litro =$total/$data['prelitro'];
                        $hoja1a = $data['desde'];
                        $hoja1b = $data['desde'] + 29;
                        $hoja2a = $data['desde'] + 30;
                        $hoja2b = $data['desde'] + 59;
                        $hoja3a = $data['desde'] + 60;
                        $hoja3b = $data['desde'] + 89;
                        $hoja4a = $data['desde'] + 90;
                        $hoja4b = $data['hasta'];
                        $id= DB::table('vales')->insertGetId([
                        'empresa_id'=>$data['empresa'],
                        'item_id'=>$data['item'],
                        'novales'=>$data['novales'],
                        'desde'=>$data['desde'],
                        'hasta'=>$data['hasta'],
                        'importeuni'=>$data['importeuni'],
                        'prelitro'=>$data['prelitro'],
                        'contador'=> $data['hasta'],
                        'importetot'=> $total,
                        'litros'=>$litro,
                        'obs'=>$data['referencia'],
                        'fecha'=>$data['fecha'],
                        'fechacc'=>$data['fechacc'],
                        'user_id'=>Auth::user()->id,
                        'desdeax'=>$hoja1a,
                        'hastaay'=>$hoja1b,
                        'desdebx'=>$hoja2a,
                        'hastaby'=>$hoja2b,
                        'desdecx'=>$hoja3a,
                        'hastacy'=>$hoja3b,
                        'desdedx'=>$hoja4a,
                        'hastady'=>$hoja4b,
                        ]);
                        $cont=0;
                        $suma= $data['importeuni'];
                        $idv= $data['desde']-1;
                                while($cont<$data['novales'] && $idv<=$data['hasta']  ){
                                    $cont ++;
                                    $idv++;
                                    DB::table('vales2')->insert([
                                        'id' => $idv,
                                        'vale_id'=>$id,
                                        'empresa_id'=>$data['empresa'],
                                        'imp'=>$suma]);
                                    }    
                } catch (\Exception $e){}
                    return redirect()->action('ValeController@create');
                    break;
                    case($data['novales'] > 120 && $data['novales']<=150):
                        try{
                            $total = $data['novales']*$data['importeuni'];
                            $litro =$total/$data['prelitro'];
                            $hoja1a = $data['desde'];
                            $hoja1b = $data['desde'] + 29;
                            $hoja2a = $data['desde'] + 30;
                            $hoja2b = $data['desde'] + 59;
                            $hoja3a = $data['desde'] + 60;
                            $hoja3b = $data['desde'] + 89;
                            $hoja4a = $data['desde'] + 90;
                            $hoja4b = $data['desde'] + 119;
                            $hoja5a = $data['desde'] + 120;
                            $hoja5b = $data['hasta'];
                            $id= DB::table('vales')->insertGetId([
                            'empresa_id'=>$data['empresa'],
                            'item_id'=>$data['item'],
                            'novales'=>$data['novales'],
                            'desde'=>$data['desde'],
                            'hasta'=>$data['hasta'],
                            'importeuni'=>$data['importeuni'],
                            'prelitro'=>$data['prelitro'],
                            'contador'=> $data['hasta'],
                            'importetot'=> $total,
                            'litros'=>$litro,
                            'obs'=>$data['referencia'],
                            'fecha'=>$data['fecha'],
                            'fechacc'=>$data['fechacc'],
                            'user_id'=>Auth::user()->id,
                            'desdeax'=>$hoja1a,
                            'hastaay'=>$hoja1b,
                            'desdebx'=>$hoja2a,
                            'hastaby'=>$hoja2b,
                            'desdecx'=>$hoja3a,
                            'hastacy'=>$hoja3b,
                            'desdedx'=>$hoja4a,
                            'hastady'=>$hoja4b,
                            'desdeex'=>$hoja5a,
                            'hastaey'=>$hoja5b,
                            ]);
                            $cont=0;
                            $suma= $data['importeuni'];
                            $idv= $data['desde']-1;
                                    while($cont<$data['novales'] && $idv<=$data['hasta']  ){
                                        $cont ++;
                                        $idv++;
                                        DB::table('vales2')->insert([
                                            'id' => $idv,
                                            'vale_id'=>$id,
                                            'empresa_id'=>$data['empresa'],
                                            'imp'=>$suma]);
                                        }    
                    } catch (\Exception $e){}
                        return redirect()->action('ValeController@create');
                        break;
                
        } 
        

    }


    public function recibo(vale $vale)
    {
        $vales=DB::table('vales')->paginate();
        return view('vale.recibo', compact('vale'));
    }
    
    public function pdf(vale $vale){
        $vales=DB::table('vales')->paginate();
        
        // Crea una nueva instancia de Dompdf
        $dompdf = new Dompdf();

        // Renderiza la plantilla de Blade y almacena el HTML en una variable
        $html = view('vale.recibo', compact('vale'))->render();
        //&$html = '<h1>Hola mundo!</h1><p>Este es un ejemplo de PDF generado con Dompdf.</p>';

        // Carga el contenido HTML
        $dompdf->loadHtml($html);

        // Establece el tamaño y orientación del papel
        $dompdf->setPaper('letter', 'portrait');

        // Renderiza el HTML como PDF
        $dompdf->render();

        // Salida del PDF al navegador
        $dompdf->stream();
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vale  $vale
     * @return \Illuminate\Http\Response
     */
    public function show(vale $vale)
    {
        $vales=DB::table('vales')->paginate();
        return view('vale.show', compact('vale'));
    }
    public function findRecord($attribute)
{
    $record = DB::connection('secondary')->table('table_name')->where('attribute', $attribute)->first();
    return $record;
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vale  $vale
     * @return \Illuminate\Http\Response
     */

    public function boleta(vale $vale){
        $vales=DB::table('vales')->paginate();
        return view('vale.boleta', compact('vale'));
    }
    
    
    public function pdfvale(vale $vale){
        $vales=DB::table('vales')->paginate();
        $pdf=PDF::loadView('vale.cheque', compact('vale'));
        return $pdf->stream('cheque.pdf');
    }
    public function pdfvale1(vale $vale){
        $vales=DB::table('vales')->paginate();
        $pdf=PDF::loadView('vale.cheque1', compact('vale'));
        return $pdf->stream('cheque1.pdf');
    }
    public function pdfvale2(vale $vale){
        $vales=DB::table('vales')->paginate();
        $pdf=PDF::loadView('vale.cheque2', compact('vale'));
        return $pdf->stream('cheque2.pdf');
    }
    public function pdfvale3(vale $vale){
        $vales=DB::table('vales')->paginate();
        $pdf=PDF::loadView('vale.cheque3', compact('vale'));
        return $pdf->stream('cheque3.pdf');
    }
    public function pdfvale4(vale $vale){
        $vales=DB::table('vales')->paginate();
        $pdf=PDF::loadView('vale.cheque4', compact('vale'));
        return $pdf->stream('cheque4.pdf');
    }
    public function pdfvale5(vale $vale){
        $vales=DB::table('vales')->paginate();
        $pdf=PDF::loadView('vale.cheque5', compact('vale'));
        return $pdf->stream('cheque5.pdf');
    }
    

    public function cheque(vale $vale){
        $vales=DB::table('vales')->paginate();
        return view('vale.cheque', compact('vale'));
    }
    public function cheque1(vale $vale){
        $vales=DB::table('vales')->paginate();
        return view('vale.cheque1', compact('vale'));
    }
    public function cheque2(vale $vale){
        $vales=DB::table('vales')->paginate();
        return view('vale.cheque2', compact('vale'));
    }
    public function cheque3(vale $vale){
        $vales=DB::table('vales')->paginate();
        return view('vale.cheque3', compact('vale'));
    }
    public function cheque4(vale $vale){
        $vales=DB::table('vales')->paginate();
        return view('vale.cheque4', compact('vale'));
    }
    public function cheque5(vale $vale){
        $vales=DB::table('vales')->paginate();
        return view('vale.cheque5', compact('vale'));
    }

    public function edit(Request $request, $id)
{
    /*$validatedData = $request->validate([
        'estates' => 'required'
    ]);

    $vales2 = Vale2::findOrFail($id);
    $vales2->estates = $validatedData['estates'];
    $vales2->save();

    return redirect()->route('vale.index')->with('success', 'Vale2 Updated Successfully');
*/
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vale  $vale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vale $vale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vale  $vale
     * @return \Illuminate\Http\Response
     */
    public function destroy(vale $vale)
    {
        //
    }
}
