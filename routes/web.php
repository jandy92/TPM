<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


//Para rutas dentro del siguiente grupo se llamará al middleware check_login
//si el usuario esta logueado continúa, de otro modo, se enviará a la pantalla de login
route::group(['middleware'=>'check_login'],function(){
	Route::get('/','PagesController@index');
	Route::get('/demo/cotizacion_form','PagesController@showFormularioCotizacion');

	Route::group(['middleware'=>'AdminOnly'],function(){
		Route::get('/users/list','PagesController@showUsersList');
	});

});

route::get('/login','Auth\LoginController@showLoginForm');
route::post('/login','Auth\LoginController@login');
route::get('logout','Auth\LoginController@logout');
