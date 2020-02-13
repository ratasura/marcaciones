<?php

namespace App\Http\Controllers;

use App\Historico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class historicoAtrasoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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
             return view ('historico.atrasos.index', compact('atrasos','fecInicio','fecFinal','nombre'));

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
             return view ('historico.atrasos.index', compact('atrasos','fecInicio','fecFinal','nombre'));
        }
       
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($request);
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
        $atraso =  Historico::findOrFail($id);
		$atraso->delete();
		return Redirect::to('atrasos');
    }
}
