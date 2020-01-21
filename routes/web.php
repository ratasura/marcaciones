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

Route::get('cargar','MarcacionesController@cargaview')->name('cargar');
Route::post('cargar','MarcacionesController@importar')->name('subir');
Route::get('listar','MarcacionesController@listar')->name('listar');

Route::resource('funcionarios','FuncionarioController');