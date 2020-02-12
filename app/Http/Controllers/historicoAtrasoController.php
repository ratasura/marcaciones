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
        if(isset($request->fecInicio) && isset($request->fecFinal) && isset($request->ci)){
            $fecInicio = $request->fecInicio;
            $fecFinal = $request->fecFinal;
            $ci = $request->ci;
            $atrasos =  DB::table('historicos')
            ->where('ci','LIKE','%'.$ci.'%')
            ->orWhere('nombre','LIKE','%'.$ci.'%')
            ->paginate(3);
            //dd($atrasos->all());
            $atrasos = $atrasos->appends(['fecInicio'=>$fecInicio, 'fecFinal'=>$fecFinal, 'ci'=>$ci]);
            return view ('historico.atrasos.index', compact('atrasos','fecInicio','fecFinal','ci'));

        }
        else{
            
            $atrasos = DB::table('historicos')->paginate(3);
            $fecInicio= date('Y-m-d');
            $fecFinal= date('Y-m-d');
            $ci = '';
            //$atrasos = $atrasos->appends(['fecInicio'=>$fecInicio, 'fecFinal'=>$fecFinal, 'ci'=>$ci]);
            return view ('historico.atrasos.index', compact('atrasos','fecInicio','fecFinal','ci'));
        }
        //return view ('historico.atrasos.index', compact('atrasos'));
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
