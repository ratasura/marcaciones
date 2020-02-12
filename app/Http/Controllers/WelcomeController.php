<?php

namespace App\Http\Controllers;

use App\Historico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }
    
      public function index(Request $request){
       
        $mes = $request->mes;
       
        $atrasos = DB::table('funcionarios')
        ->join('historicos','funcionarios.ci','=','historicos.ci')
        ->select('historicos.nombre',DB::raw('SUM(minutosatraso) as total'))
        ->whereMonth('historicos.fechaincidente','=',$mes)
        ->groupBy('historicos.nombre')
        ->orderBy('total','desc')
        ->paginate(10);
        //dd($atrasos);

       return view('welcome' , compact('atrasos'));
     }
}
