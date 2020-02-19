<?php

namespace App\Http\Controllers;

use App\Historico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class ReportesController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        if(isset($request->mes)){
            $mes = $request->mes;
            $atrasos = DB::table('funcionarios')
            ->join('historicos','funcionarios.ci','=','historicos.ci')
            ->select('historicos.nombre',DB::raw('SUM(minutosatraso) as total'))
            ->whereMonth('historicos.fechaincidente','=',$mes)
            ->groupBy('historicos.nombre')
            ->orderBy('total','desc')
            ->paginate(10);
            //dd($atrasos);
            
            $atrasos = $atrasos->appends(['mes'=>$mes]);      
            return view('reportes.minutospormes' , compact('atrasos','mes'));      
        
        }
        else{
            $mes = date('m');
            $atrasos = DB::table('funcionarios')
            ->join('historicos','funcionarios.ci','=','historicos.ci')
            ->select('historicos.nombre',DB::raw('SUM(minutosatraso) as total'))
            ->whereMonth('historicos.fechaincidente','=',$mes)
            ->groupBy('historicos.nombre')
            ->orderBy('total','desc')
            ->paginate(10);
            //dd($atrasos);
            
            $atrasos = $atrasos->appends(['mes'=>$mes]);   
            return view('reportes.minutospormes' , compact('atrasos','mes'));
            
        }       
     }

    

     public function totalMinutosPdf($mes){
        //dd($mes);
        $atrasos = DB::table('funcionarios')
        ->join('historicos','funcionarios.ci','=','historicos.ci')
        ->select('historicos.nombre',DB::raw('SUM(minutosatraso) as total'))
        ->whereMonth('historicos.fechaincidente','=',$mes)
        ->groupBy('historicos.nombre')
        ->orderBy('total','desc')
        ->paginate(50);
         $pdf = PDF::loadView('pdf.vista_total_minutos', compact('atrasos','mes'));        
        return $pdf->download('listado.pdf');


     }


     public function marcacionesFuncionariosPdf($fecInicio, $fecFinal, $ci){
        //dd($fecInicio,$fecFinal,$ci);
        $marcaciones =  DB::table('marcaciones')
            ->where('ci','LIKE','%'.$ci.'%')
            ->whereDate('fecha','>=',$fecInicio)
            ->whereDate('fecha','<=',$fecFinal)
            ->paginate(50);
            //dd($atrasos);
            $pdf = PDF::loadView('pdf.vista_marcaciones_funcionarios', compact('marcaciones'));        
            return $pdf->download('listado.pdf');

     }

     public function totalAtrasosPdf(Request $request) {
         
        if(isset($request->fecInicio) && isset($request->fecFinal) && isset($request->nombre)){
            $fecInicio = $request->fecInicio;
            $fecFinal = $request->fecFinal;
            $nombre = $request->nombre;
            $atrasos =  DB::table('historicos')
            ->where('nombre','LIKE','%'.$request->nombre.'%')
            ->whereDate('fechaincidente','>=',$fecInicio)
            ->whereDate('fechaincidente','<=',$fecFinal)
            ->paginate(5);
            $atrasos = $atrasos->appends(['fecInicio'=>$fecInicio, 'fecFinal'=>$fecFinal, 'nombre'=>$nombre]);
             //dd($atrasos);
             return view ('reportes.totalatrasos', compact('atrasos','fecInicio','fecFinal','nombre'));

        }
        else{
            
            $fecInicio = date('Y-m-d');
            $fecFinal = date('Y-m-d');
            $nombre = "admin";
            $atrasos =  DB::table('historicos')
            ->where('nombre','LIKE','%'.$nombre.'%')
            ->whereDate('fechaincidente','>=',$fecInicio)
            ->whereDate('fechaincidente','<=',$fecFinal)
            ->paginate(5);
            $atrasos = $atrasos->appends(['fecInicio'=>$fecInicio, 'fecFinal'=>$fecFinal, 'nombre'=>$nombre]);
             //dd($atrasos);
             return view ('reportes.totalatrasos', compact('atrasos','fecInicio','fecFinal','nombre'));
        }

        
     }


     public function totalatrasos(Request $request){

        $fecInicio = $request->fecInicio;
        $fecFinal = $request->fecFinal;
        $nombre = $request->nombre;
        $atrasos =  DB::table('historicos')
        ->where('nombre','LIKE','%'.$request->nombre.'%')
        ->whereDate('fechaincidente','>=',$fecInicio)
        ->whereDate('fechaincidente','<=',$fecFinal)
        ->paginate(50);
        $pdf = PDF::loadView('pdf.vista_totalatrasos_funcionarios', compact('atrasos','fecInicio','fecFinal'));        
            return $pdf->download('listado.pdf');

        

     }


    // public function create(Request $request)
    // {
       
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
