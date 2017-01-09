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

	Route::group(['prefix' => 'cliente','middleware'=>['filtro_user']],function(){
		Route::get('/nuevo', 'ControladorCliente@nuevoClienteForm');
		Route::get('/lista', 'ControladorCliente@listaDeCliente');
	});

	Route::group(['prefix' => 'trabajo','middleware'=>['filtro_user']],function(){
		Route::get('/nuevo', 'ControladorTrabajo@nuevoTrabajoForm');	
	});
	
	Route::group(['prefix' => 'cotizacion','middleware'=>['filtro_user']],function(){
		Route::get('/nueva', 'ControladorCotizacion@nuevaCotizacionForm');
		Route::get('/lista', 'ControladorCotizacion@listaCotizacion');	
	});

	Route::group(['prefix' => 'usuario','middleware'=>['filtro_admin']],function(){
		Route::get('/lista','ControladorUsuario@listaUsuario');
		Route::get('/nuevo','ControladorUsuario@nuevoUsuarioForm');
		Route::post('/nuevo','ControladorUsuario@crearNuevoUsuario');

	});

	Route::get('/', 'ControladorPaginas@home');
	Route::get('/home', 'HomeController@index');

	$this->get('/logout', 'Auth\LoginController@logout');
});

$this->get('/login', 'Auth\LoginController@showLoginForm');
$this->post('/login', 'Auth\LoginController@login');
//Auth::routes();

