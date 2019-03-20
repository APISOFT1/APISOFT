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


Route::group(['middleware' => ['web']], function() {
  Route::resource('Rol','RolController');
  Route::POST('addRol','RolController@addRol');
  Route::POST('editRol','RolController@editRol');
  Route::POST('deleteRol','RolController@deleteRol');
  
Route::resource('Afiliado','AfiliadoController');
Route::POST('addAfiliado','AfiliadoController@addAfiliado');
Route::POST('editAfiliado','AfiliadoController@editAfiliado');
Route::POST('deleteAfiliado','AfiliadoController@deleteAfiliado');

  
  Auth::routes(['verify' => true]);
  Route::get('/home','HomeController@index')->name('home');
});