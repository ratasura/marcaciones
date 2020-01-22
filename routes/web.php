<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// importar csv a la aplicacion 
Route::get('cargar','MarcacionesController@cargaview')->name('cargar');
Route::post('cargar','MarcacionesController@importar')->name('subir');
Route::get('listar','MarcacionesController@listar')->name('listar');
// ****************************************************************************
// crud de usuarios
Route::resource('funcionarios','FuncionarioController');
//*************************************************************************** */
// rutas del historico (marcaciones por usuario)
Route::get('historico','HistoricoController@index');
Route::post('historico','HistoricoController@indexbusqueda')->name('historico');

