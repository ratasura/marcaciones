<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     */
    public function __construct(){
        $this->middleware('auth');
      }

    public function index(Request $request)
	{
		if ($request) {
			$query=trim($request->get('searchText'));
			$funcionarios=DB::table('funcionarios')
			->where('ci','LIKE','%'.$query.'%')
			->orWhere('nombre','LIKE','%'.$query.'%')
			->orderBy('id','desc')
			->paginate(10);
			return view ('funcionarios.index',["funcionarios"=>$funcionarios,"searchText"=>$query]);
		}

	} 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funcionario = new Funcionario;
        $funcionario->nombre=$request->get('nombre');
        $funcionario->mail=$request->get('mail');
        $funcionario->ci=$request->get('ci');
        $funcionario->save();
        return Redirect::to('funcionarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('funcionarios.show',["funcionario"=>Funcionario::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("funcionarios.edit",["funcionario"=>Funcionario::findOrFail($id)]);
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
        $funcionario = Funcionario::findOrFail($id);
        $funcionario->nombre=$request->get('nombre');
        $funcionario->mail=$request->get('mail');
        $funcionario->ci=$request->get('ci');
        $funcionario->update();
        return Redirect::to('funcionarios');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario =  Funcionario::findOrFail($id);
		$funcionario->destroy($id);
		return Redirect::to('funcionarios');
    }
}
