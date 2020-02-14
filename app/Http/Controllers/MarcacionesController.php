<?php

namespace App\Http\Controllers;

use App\Imports\ImportMarcaciones;
use App\Marcacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MarcacionesController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
      }
    
    public function cargaview()
    {
        return view('marcaciones.cargar');
    }

    public function importar (Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportMarcaciones, request()->file('import_file'));
        return back()->with('status', 'archivo importado correctamente ');

    }

    public function listar()
    {
        $fecInicio = date('Y-m-d');
        $fecFinal = date('Y-m-d');
        $nombre = "admin";
        $marcaciones =  DB::table('marcaciones')
            ->where('nombre','LIKE','%'.$nombre.'%')
            ->whereDate('fecha','>=',$fecInicio)
            ->whereDate('fecha','<=',$fecFinal)
            ->orderBy('fecha','asc')
            ->paginate(10);
            $marcaciones = $marcaciones->appends(['fecInicio'=>$fecInicio, 'fecFinal'=>$fecFinal, 'nombre'=>$nombre]);
             //dd($marcaciones);
             return view ('reportes.listar', compact('marcaciones','fecInicio','fecFinal','nombre'));
    }

    public function listarmarcaciones(Request $request)
    {
        
        if(isset($request->fecInicio) && isset($request->fecFinal) && isset($request->nombre)){
            $fecInicio = $request->fecInicio;
            $fecFinal = $request->fecFinal;
            $nombre = $request->nombre ;            
            $nombre_may = strtoupper($nombre);
            $marcaciones =  DB::table('marcaciones')
            ->where('nombre','LIKE','%'.$nombre_may.'%')
            ->whereDate('fecha','>=',$fecInicio)
            ->whereDate('fecha','<=',$fecFinal)
            ->orderBy('fecha','asc')
            ->paginate(10);
            //dd($marcaciones);
            $marcaciones = $marcaciones->appends(['fecInicio'=>$fecInicio, 'fecFinal'=>$fecFinal, 'nombre'=>$nombre]);
             //dd($atrasos);
             return view ('reportes.listar', compact('marcaciones','fecInicio','fecFinal','nombre'));
        }

        else{
            
            $fecInicio = date('Y-m-d');
            $fecFinal = date('Y-m-d');
            $nombre = "admin";
            $marcaciones =  DB::table('marcaciones')
            ->where('nombre','LIKE','%'.$nombre.'%')
            ->whereDate('fecha','>=',$fecInicio)
            ->whereDate('fecha','<=',$fecFinal)
            ->orderBy('fecha','asc')
            ->paginate(10);
            $marcaciones = $marcaciones->appends(['fecInicio'=>$fecInicio, 'fecFinal'=>$fecFinal, 'nombre'=>$nombre]);
             //dd($marcaciones);
             return view ('reportes.listar', compact('marcaciones','fecInicio','fecFinal','nombre'));
        }
        
    }

}
