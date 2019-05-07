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
//Auth::routes(['verify' => true]);


  // Authentication Routes...

    
    // Registration Routes...
    if (config('auth.registration')) {
      Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
      Route::post('register', 'RegisterController@register');
  }

  if (config('auth.confirm_email')) {
    Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
    Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
}
      Route::get('chart', 'ChartController@index'); 

     Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
     Route::get('chartRecepcion', 'Admin\DashboardController@indexRecepcion')->name('chartRecepcion');
     Route::get('chartIngreso', 'Admin\DashboardController@indexIngreso')->name('chartIngreso');


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
'Producto' => 'ProductController',
'RecepEstanon' => 'RecepcionEstanonController',
'/' => 'Admin\DashboardController',



  ]);

  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
  Route::get('users/{users}/edit', 'UsersController@edit')->name('users.edit');
  Route::put('users/{users}', 'UsersController@update')->name('users.update');
Route::POST('addAfiliado','AfiliadoController@addAfiliado');
Route::POST('editAfiliado','AfiliadoController@editAfiliado');
Route::POST('deleteAfiliado','AfiliadoController@deleteAfiliado');


Route::get('dashboard/log-chart', 'Admin\DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'Admin\DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');

Route::POST('addPermissions','Admin\PermissionsController@addPermissions');
Route::POST('ediPermissions','Admin\PermissionsController@ediPermissions');
Route::POST('deletePermissions','Admin\PermissionsController@deletePermissions');

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

 
