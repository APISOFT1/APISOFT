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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(
[
        //'users' => 'UserController',
        'Rol','RolController',
        //'Estanon','EstanonController',
        'Genero','GeneroController',
       // 'Estado_Civil','EstadoCivilController'
        //'Ubicacion','UbicacionController',
        //'Colmena','ColmenaController',
      //  'Usuario','UsuarioController',
        //'Afiliado','AfiliadoController'
	]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('Estanon','EstanonController');
Route::resource('Genero','GeneroController');
Route::resource('EstadoCivil','EstadoCivilController');
Route::resource('Ubicacion','UbicacionController');
Route::resource('Ubicacion','UbicacionController');
Route::resource('Apiario','ApiarioController');
Route::resource('Afiliado','AfiliadoController');
Route::resource('AfiliadoApiario','AfiliadoApiarioController');
Route::resource('Usuario','UserController');
Route::resource('Rol','RolController');


