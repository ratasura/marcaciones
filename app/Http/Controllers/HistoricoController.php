<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Marcacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoricoController extends Controller
{
    public function index(Request $request){

        if(isset($request->fecInicio) && isset($request->fecFinal))
        {
            $fecInicio = $request->fecInicio;
            $fecFinal = $request->fecFinal;
            //dd($request->all());
        }
        else{
            $fecInicio= date('Y-m-d');
            $fecFinal= date('Y-m-d');
        }
        $funcionarios = Funcionario::paginate(20);
        //dd($request->all());
        return view('historico.listar',compact('funcionarios','fecInicio','fecFinal'));
    }

    public function indexbusqueda(Request $request)
    {
        if(isset($request->fecInicio) && isset($request->fecFinal))
        {
            $fecInicio = $request->fecInicio;
            $fecFinal = $request->fecFinal;
           // dd($request->all());
        }
        else{
            $fecInicio= date('Y-m-d');
            $fecFinal= date('Y-m-d');
        }
        $funcionarios = Funcionario::paginate(20);
        //dd($request->all());
        return view('historico.listar',compact('funcionarios','fecInicio','fecFinal'));

    }

   
}
