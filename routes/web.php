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
Auth::routes();



Route::group(['middleware' =>['auth']], function () {
  
  Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); 
  
  
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('role:administrador');;
    Route::post('register', 'Auth\RegisterController@register');


  Route::get('activate/{token}', 'Auth\RegisterController@activate')
      ->name('activate');
      
     
  Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
  
  

  
 Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
 Route::get('chartRecepcion', 'Admin\DashboardController@indexRecepcion')->name('chartRecepcion')->middleware('role:planta;authenticated;administrador');
 Route::get('chartIngreso', 'Admin\DashboardController@indexIngreso')->name('chartIngreso')->middleware('role:administrador');
 
      

 Route::get('users', 'Admin\UserController@index')->middleware('role:administrador');
 Route::get('Afiliado', 'AfiliadoController@index')->middleware('role:administrador');


  Route::resources([
'Estanon'=>'EstanonController',
'Genero'=>'GeneroController',
'EstadoCivil'=>'EstadoCivilController',
'Ubicacion'=>'UbicacionController',
'AfiliadoApiario'=>'AfiliadoApiarioController',
'Apiario' => 'ApiarioController',
'Estado'=>'EstadoController',
'RecepcionMateriaPrima'=> 'RecepcionMateriaPrimaController',
'Ingreso' => 'IngresoController',
'IngresoCera' => 'IngresoCeraController',
'IngresoInventario' => 'IngresoInventarioController',
'Cera'=>'CeraController',
'Producto' => 'ProductController',
'RecepEstanon' => 'RecepcionEstanonController',


  ]);

  
  Route::get('users/{users}/edit', 'Admin\UserController@edit')->name('users.edit');
  Route::post('users/{users}', 'Admin\UserController@update')->name('users.update');
Route::POST('addAfiliado','AfiliadoController@addAfiliado');
Route::POST('editAfiliado','AfiliadoController@editAfiliado');
Route::POST('deleteAfiliado','AfiliadoController@deleteAfiliado');

Route::POST('addRole','Admin\RolesController@addRole');
Route::POST('editRol','Admin\RolesController@editRole');
Route::POST('deleteRol','Admin\RolesController@deleteRole');

Route::POST('addRecepcionMateriaPrima','RecepcionMateriaPrimaController@addRecepcionMateriaPrima');
Route::POST('editRecepcionMateriaPrima','RecepcionMateriaPrimaController@editRecepcionMateriaPrima');
Route::POST('deleteRecepcionMateriaPrima','RecepcionMateriaPrimaController@deleteRecepcionMateriaPrima');

Route::get('find', 'ApiarioController@find');
Route::POST('addApiario','ApiarioController@addApiario');
Route::POST('editApiario','ApiarioController@editApiario');
Route::POST('deleteApiario','ApiarioController@deleteApiario');

Route::POST('addAfiliadoApiario','AfiliadoApiarioController@addAfiliadoApiario');
Route::POST('editApiario','ApiarioController@editApiario');
Route::POST('deleteApiario','ApiarioController@deleteApiario');

Route::POST('addCera','CeraController@addCera');
Route::POST('editCera','CeraController@editCera');
Route::POST('deleteCera','CeraController@deleteCera');
Route::POST('agregar','CeraController@agregar');

Route::POST('addRecepcion','RecepcionEstanonController@addRecepcion');
Route::POST('editRecepcion','RecepcionEstanonController@editRecepcion');
Route::POST('deleRecepcion','RecepcionEstanonController@deleteRecepcion');

Route::POST('editUser','Admin\UsersController@editUser');
Route::POST('deleteUser','Admin\UsersController@deleteUser');

Route::POST('addUser','Auth\RegisterController@addUser');
Route::POST('editUser','Admin\UsersController@editUser');
Route::POST('deleteUser','Admin\UsersController@deleteUser');

Route::POST('addProduct','ProductController@addProduct');
Route::POST('editProduct','ProductController@editProduct');
Route::POST('deleteProduct','ProductController@deleteProduct');

Route::POST('addUbicacion','UbicacionController@addUbicacion');
Route::POST('editUbicacion','UbicacionController@editUbicacion');
Route::POST('deleteUbicacion','UbicacionController@deleteUbicacion');
});
 
$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

  
Route::get('test', ['as' => 'test', 'uses' => 'AlertController@index']);
