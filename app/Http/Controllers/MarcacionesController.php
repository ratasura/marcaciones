<?php

namespace App\Http\Controllers;

use App\Imports\ImportMarcaciones;
use App\Marcacion;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MarcacionesController extends Controller
{
    
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
        return back()->with('success', 'Importacion correcta');

    }

    public function listar()
    {
        $marcaciones = Marcacion::marcaciones()->paginate(10);
        return view ('marcaciones.listar', compact('marcaciones'));
    }

}
