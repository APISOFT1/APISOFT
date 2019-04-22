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
Auth::routes(['verify' => true]);


//Route::group(['middleware' =>['auth',  'verified']], function () {
// Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
     if ($options['register'] ?? true) {
          $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
          $this->post('register', 'Auth\RegisterController@register');
      }

   //   Route::get('/', 'DashboardController@index')->name('dashboard');

       // Dashboard
  //Route::get('users', ' Admin\DashboardController')->name('dashboard'); 

  Route::resources([
'Estanon'=>'EstanonController',
'Genero'=>'GeneroController',
'EstadoCivil'=>'EstadoCivilController',
'Ubicacion'=>'UbicacionController',
'Afiliado' => 'AfiliadoController',
'AfiliadoApiario'=>'AfiliadoApiarioController',
'Apiario' => 'ApiarioController',
'Usuario'=>'UserController',
'Rol'=>'RolController',
'Estado'=>'EstadoController',
'RecepcionMateriaPrima'=> 'RecepcionMateriaPrimaController',
'Ingreso' => 'IngresoController',
'IngresoCera' => 'IngresoCeraController',
'IngresoInventario' => 'IngresoInventarioController',
'admin/permissions' => 'Admin\PermissionsController',
'admin/roles'=> 'Admin\RolesController',
'users'=> 'Admin\UsersController',
'Cera'=>'CeraController',
'RecepEstanon' => 'RecepcionEstanonController',
'/' => 'Admin\DashboardController',



  ]);
  Route::get('users/{users}/edit', 'UsersController@edit')->name('users.edit');
  Route::put('users/{users}', 'UsersController@update')->name('users.update');
Route::POST('addAfiliado','AfiliadoController@addAfiliado');
Route::POST('editAfiliado','AfiliadoController@editAfiliado');
Route::POST('deleteAfiliado','AfiliadoController@deleteAfiliado');

Route::POST('addPermissions','Admin\PermissionsController@addPermissions');
Route::POST('ediPermissions','Admin\PermissionsController@ediPermissions');
Route::POST('deletePermissions','Admin\PermissionsController@deletePermissions');

Route::POST('addRole','Admin\RolesController@addRole');
Route::POST('editRol','Admin\RolesController@editRole');
Route::POST('deleteRol','Admin\RolesController@deleteRole');

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

Route::POST('addUbicacion','UbicacionController@addUbicacion');
Route::POST('editUbicacion','UbicacionController@editUbicacion');
Route::POST('deleteUbicacion','UbicacionController@deleteUbicacion');

//});
 
