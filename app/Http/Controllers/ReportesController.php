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


    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
