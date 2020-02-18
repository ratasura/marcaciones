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

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('welcome','WelcomeController@index')->name('welcome');
Route::post('login','Auth\LoginController@login')->name('login');
Route::post('logout','Auth\LoginController@logout')->name('logout');

// importar csv a la aplicacion 
Route::get('cargar','MarcacionesController@cargaview')->name('cargar');
Route::post('cargar','MarcacionesController@importar')->name('subir');
Route::get('listar','MarcacionesController@listar')->name('listar');
Route::post('listar','MarcacionesController@listarmarcaciones')->name('listarmarcaciones');
// ****************************************************************************
// crud de FUNCIONARIOS
Route::resource('funcionarios','FuncionarioController');
//*************************************************************************** */
// rutas del historico (marcaciones por usuario)
Route::get('historico','HistoricoController@index');
Route::post('historico','HistoricoController@indexbusqueda')->name('historico');


// envio de notificaciones 
Route::get('notificar/{id}/{fecha}', 'NotificacionAtrasoController@index')->name('notificar');

// manejo de atrasos en la tabla historicos
Route::resource('atrasos','historicoAtrasoController')->except(['create']);

// reportes 
Route::resource('reportes', 'ReportesController');

Route::get('total-minutos-pdf/{id}','ReportesController@totalMinutosPdf')->name('totalminutos.pdf');



