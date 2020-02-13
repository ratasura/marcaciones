<?php

namespace App\Http\Controllers;

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
            
        }


        return view('reportes.minutospormes' , compact('atrasos','mes'));
       
       
       
        
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function pdf (Request $request){
        $mes = $request->mes;
        $atrasos = DB::table('funcionarios')
        ->join('historicos','funcionarios.ci','=','historicos.ci')
        ->select('historicos.nombre',DB::raw('SUM(minutosatraso) as total'))
        ->whereMonth('historicos.fechaincidente','=',$mes)
        ->groupBy('historicos.nombre')
        ->orderBy('total','desc')
        ->paginate(10);

        return $request;



     }


    public function create(Request $request)
    {
        // $pdf = App::make('dompdf.wrapper');
        //  $pdf->loadHTML('<h1>Test</h1>');
        // $pdf = PDF::loadHTML('<h1>Test</h1>');
        // $pdf = PDF::loadview('welcome');

        dd($request->all());
        $pdf = App::make('dompdf.wrapper');
        $pdf -> loadview('welcome');
        return $pdf->download();
        //return $pdf->stream();
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
