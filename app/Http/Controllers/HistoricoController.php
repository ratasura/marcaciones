<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Marcacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoricoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $funcionarios = Funcionario::paginate(50);
        if(isset($request->fecInicio) && isset($request->fecFinal))
        {
            $fecInicio = $request->fecInicio;
            $fecFinal = $request->fecFinal;
            $jornada = $request->jornada;
            //dd($request->all());
           $funcionarios = $funcionarios->appends(['fecInicio'=>$fecInicio, 'fecFinal'=>$fecFinal, 'jornada'=>$jornada]); 
           return view('historico.listar',compact('funcionarios','fecInicio','fecFinal','jornada'));
        }
        else{
            $fecInicio= date('Y-m-d');
            $fecFinal= date('Y-m-d');
            $jornada = '0';
            $funcionarios = $funcionarios->appends(['fecInicio'=>$fecInicio, 'fecFinal'=>$fecFinal, 'jornada'=>$jornada]); 
            return view('historico.listar',compact('funcionarios','fecInicio','fecFinal','jornada'));
        }
        
       // dd($request->all());
        //return view('historico.listar',compact('funcionarios','fecInicio','fecFinal','jornada'));
    }
    public function indexbusqueda(Request $request)
    {
        $funcionarios = Funcionario::paginate(50);

        if(isset($request->fecInicio) && isset($request->fecFinal))
        {
            $fecInicio = $request->fecInicio;
            $fecFinal = $request->fecFinal;
            $jornada = $request->jornada;
            //dd($request->all());
           $funcionarios = $funcionarios->appends(['fecInicio'=>$fecInicio, 'fecFinal'=>$fecFinal, 'jornada'=>$jornada]); 
           return view('historico.listar',compact('funcionarios','fecInicio','fecFinal','jornada'));
        }
        else{
            $fecInicio= date('Y-m-d');
            $fecFinal= date('Y-m-d');
            $jornada = '0';
            $funcionarios = $funcionarios->appends(['fecInicio'=>$fecInicio, 'fecFinal'=>$fecFinal, 'jornada'=>$jornada]); 
            return view('historico.listar',compact('funcionarios','fecInicio','fecFinal','jornada'));
        }
        
       // dd($request->all());
        //return view('historico.listar',compact('funcionarios','fecInicio','fecFinal','jornada'));

    }

    


   
}
