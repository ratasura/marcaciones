<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Historico;
use App\Http\Requests\historicoFormRequest;
use App\Mail\NotificacionAtraso;
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
        //$type = gettype($rest);
        //dd($id,$ci,$nombre,$fecha,$minutosatraso);
        //Mail::to($mail)->send(new NotificacionAtraso);
        $historico = new Historico();
        $historico->id_funcionario=$id;
        $historico->ci=$ci;
        $historico->nombre= $nombre;
        $historico->fechaincidente=$fecha;
        $historico->minutosatraso=$minutosatraso;
        $historico->save();
        return back();
        
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
