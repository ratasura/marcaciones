<?php

namespace App\Http\Controllers;

use App\Imports\ImportMarcaciones;
use App\Marcacion;
use Illuminate\Http\Request;
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
        $marcaciones = Marcacion::marcaciones()->paginate(10);
        return view ('marcaciones.listar', compact('marcaciones'));
    }

}
