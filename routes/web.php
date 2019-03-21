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
'Afiliado' =>'AfiliadoController',
'AfiliadoApiario'=>'AfiliadoApiarioController',
'Usuario'=>'UserController',
'Rol'=>'RolController',
'Estado'=>'EstadoController',
'RecepcionMateriaPrima'=> 'RecepcionMateriaPrimaController',
'Ingreso' => 'IngresoController',

  ]);
 
Route::POST('addAfiliado','AfiliadoController@addAfiliado');
Route::POST('editAfiliado','AfiliadoController@editAfiliado');
Route::POST('deleteAfiliado','AfiliadoController@deleteAfiliado');

Route::POST('addRol','RolController@addRol');
Route::POST('editRol','RolController@editRol');
Route::POST('deleteRol','RolController@deleteRol');

Route::POST('addApiario','ApiarioController@addApiario');
Route::POST('editApiario','ApiarioController@editApiario');
Route::POST('deleteApiario','ApiarioController@deleteApiario');

Route::POST('addUbicacion','UbicacionController@addUbicacion');
Route::POST('editUbicacion','UbicacionController@editUbicacion');
Route::POST('deleteUbicacion','UbicacionController@deleteUbicacion');

Route::POST('addAfiliadoApiario','AfiliadoApiarioController@addAfiliadoApiario');
Route::POST('editAfiliadoApiario','AfiliadoApiarioController@editAfiliadoApiario');
Route::POST('deleteAfiliadoApiario','AfiliadoApiarioController@deleteAfiliadoApiario');


});
Route::resource('Apiario','ApiarioController');
Route::resource('Ubicacion','UbicacionController');
Route::resource('AfiliadoApiario','AfiliadoApiarioController');

  


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


