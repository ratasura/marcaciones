<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Historico;
use App\Http\Requests\historicoFormRequest;
use App\Mail\NotificacionAtraso;
use App\Novedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class NotificacionAtrasoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( $id, $fecha)
    {
        

        $funcionario = Funcionario::findOrFail($id);
        $mail = $funcionario->mail;
        $ci = $funcionario->ci;
        $nombre = $funcionario->nombre;
        $mail = trim($mail);
        //$num  = strlen($fecha);
        $minutosatraso = intval(substr($fecha, 14,2)) ; 
        $horaMarcacion = substr($fecha, 11,5);
        $texto= 'Su marcación registrada a las '. $horaMarcacion . 'representa un atraso 
        y ha sido registrado en la base de datos del sistema.
        Por favor, acérquese a la unidad de TThh para gestionar el mismo.' ;
        //$type = gettype($rest);
        //dd($id,$ci,$nombre,$fecha,$horaMarcacion);
        Mail::to($mail)->send(new NotificacionAtraso( $funcionario, $fecha, $texto));
        $historico = new Historico();
        $historico->id_funcionario=$id;
        $historico->ci=$ci;
        $historico->nombre= $nombre;
        $historico->fechaincidente=$fecha;
        $historico->minutosatraso=$minutosatraso;
        $historico->save();
        return back()->with('flash','El funcionario ha sido notificado');
        
    }

    public function notificanovedad($id, $fecha){

        $funcionario = Funcionario::findOrFail($id);
        $mail = $funcionario->mail;
        $ci = $funcionario->ci;
        $nombre = $funcionario->nombre;
        $mail = trim($mail);
        $tipo = 1;
        $texto= 'No registra marcaciones';
       // dd($id,$ci,$nombre,$fecha,$tipo,$mail);
        Mail::to($mail)->send(new NotificacionAtraso($fecha, $funcionario));
        $novedad =  new Novedad();
        $novedad->id_funcionario=$id;
        $novedad->ci=$ci;
        $novedad->nombre= $nombre;
        $novedad->fechaincidente=$fecha;
        $novedad->tipo = $tipo;
        $novedad->save();
        return back()->with('flash','El funcionario ha sido notificado');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
