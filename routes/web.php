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



Route::group(['middleware'=>['checklog','web']],function(){

	Route::get('/', function () {
	    return view('welcome');
	});
	
});


Auth::routes();

//Route::get('/', function () {return view('welcome');});
Route::get('/', 'ControladorPaginas@home');
Route::get('/cliente/nuevo', 'ControladorCliente@nuevoClienteForm');
Route::get('/cliente/lista', 'ControladorListaCliente@listaDeCliente');
Route::get('/trabajo/nuevo', 'ControladorTrabajo@nuevoTrabajoForm');
Route::get('/cotizacion/nueva', 'ControladorCotizacion@nuevaCotizacionForm');
Route::get('/cotizacion/lista', 'ControladorListaCotizacion@listaCotizacion');
Auth::routes();

Route::get('/home', 'HomeController@index');
