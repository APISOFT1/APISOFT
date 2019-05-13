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



Route::group(['middleware' =>['auth' ]], function () {
// Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
     if ($options['register'] ?? true) {
         $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
         $this->post('register', 'Auth\RegisterController@register');
      }

      Route::get('chart', 'ChartController@index'); 

     Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');

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
  Route::get('users/{users}/edit', 'UsersController@edit')->name('users.edit');
  Route::put('users/{users}', 'UsersController@update')->name('users.update');
Route::POST('addAfiliado','AfiliadoController@addAfiliado');
Route::POST('editAfiliado','AfiliadoController@editAfiliado');
Route::POST('deleteAfiliado','AfiliadoController@deleteAfiliado');

Route::get('notify/index', 'NotificationController@index');



  //route grupo 
    Route::get('Estanon' , 'EstanonController@index')->middleware('role:planta;administrador');
    Route::get('EstadoCivil', 'EstadoCivilController@index')->middleware('role:planta;administrador');
    Route::get('Ubicacion','UbicacionController@index')->middleware('role:planta;administrador');
    Route::get('AfiliadoApiario','AfiliadoApiarioController@index')->middleware('role:planta;administrador');
    Route::get('Apiario' , 'ApiarioController@index')->middleware('role:planta;administrador');
    Route::get('RecepcionMateriaPrima','RecepcionMateriaPrimaController@index')->middleware('role:planta;administrador');
    Route::get('Ingreso' , 'IngresoController@index')->middleware('role:planta;administrador');
    Route::get('IngresoCera' , 'IngresoCeraController@index')->middleware('role:planta;administrador');
    Route::get('IngresoInventario' , 'IngresoInventarioController@index')->middleware('role:planta;administrador');
    Route::get('Cera','CeraController@index')->middleware('role:planta;administrador');
    Route::get('Producto' , 'ProductController@index')->middleware('role:planta;administrador');
    Route::get('RecepEstanon' , 'RecepcionEstanonController@index')->middleware('role:planta;administrador');




  
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



Route::POST('addUser','Auth\RegisterController@addUser');
Route::POST('editUser','Admin\UserController@editUser');
Route::POST('deleteUser','Admin\UserController@deleteUser');

Route::POST('addProduct','ProductController@addProduct');
Route::POST('editProduct','ProductController@editProduct');
Route::POST('deleteProduct','ProductController@deleteProduct');

Route::POST('addUbicacion','UbicacionController@addUbicacion');
Route::POST('editUbicacion','UbicacionController@editUbicacion');
Route::POST('deleteUbicacion','UbicacionController@deleteUbicacion');
});
 
$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');

  
Route::get('test', ['as' => 'test', 'uses' => 'AlertController@index']);
 $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  $this->post('register', 'Auth\RegisterController@register');