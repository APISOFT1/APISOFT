<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
jjajaajaj
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' =>[ 'auth', 'verified']], function () {
  Route::resources([
'Estanon'=>'EstanonController',
'Genero'=>'GeneroController',
'EstadoCivil'=>'EstadoCivilController',
'Ubicacion'=>'UbicacionController',
'Apiario'=>'ApiarioController',
'Afiliado'=>'AfiliadoController',
'AfiliadoApiario'=>'AfiliadoApiarioController',
'Usuario'=>'UserController',
'Rol'=>'RolController',
'Estado'=>'EstadoController'
	
	]);
});
	

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');



