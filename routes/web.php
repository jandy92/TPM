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
		Route::post('/nuevo', 'ControladorCliente@nuevoCliente');
		Route::get('/lista', 'ControladorCliente@listaDeCliente');
		Route::get('/{id}/edit','ControladorCliente@editarClienteForm');
		Route::post('/{id}/edit','ControladorCliente@editarCliente');
	});

	Route::group(['prefix' => 'trabajo','middleware'=>['filtro_user']],function(){
		Route::get('/nuevo', 'ControladorTrabajo@nuevoTrabajoForm');	
	});
	
	Route::group(['prefix' => 'cotizacion','middleware'=>['filtro_user']],function(){
		Route::get('/nueva', 'ControladorCotizacion@nuevaCotizacionForm');
		Route::get('/lista', 'ControladorCotizacion@listaCotizacion');
		Route::post('/nueva','ControladorCotizacion@nuevaCotizacion');	
	});

	Route::group(['prefix' => 'administracion/usuario','middleware'=>['filtro_admin']],function(){
		Route::get('/lista','ControladorUsuario@listaUsuario');
		Route::get('/nuevo','ControladorUsuario@nuevoUsuarioForm');
		Route::post('/nuevo','ControladorUsuario@crearNuevoUsuario');
		Route::get('/activar/{id}','ControladorUsuario@activarUsuario');		
		Route::get('/borrar/{id}','ControladorUsuario@borrarUsuario');
		Route::get('/editar/{id}','ControladorUsuario@editarUsuarioForm');
		Route::post('/editar/{id}','ControladorUsuario@editarUsuario');
	});

	Route::get('/', 'ControladorPaginas@home');
	Route::get('/home', 'HomeController@index');

	$this->get('/logout', 'Auth\LoginController@logout');
});


Route::get('buscador/{rut_cliente}','ControladorCliente@buscaContactos');
Route::get('API/clientesdecontacto/{id}','ControladorCliente@AJAX_contactosDeCliente');
Route::get('API/buscarclientes/{texto}','ControladorCliente@AJAX_busquedaClientes');

Route::get('/activar/{token}','ControladorUsuario@activarUsuarioToken');
Route::post('/activar/{token}','ControladorUsuario@activarUsuarioTokenFinal');

$this->get('/login', 'Auth\LoginController@showLoginForm');
$this->post('/login', 'Auth\LoginController@login');
//Auth::routes();

