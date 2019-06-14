    
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
Route::resources([
    'Ingreso' => 'IngresoController',
 'IngresoCera' => 'IngresoCeraController',
 'IngresoInventario' => 'IngresoInventarioController'
      ]);
Route::group(['middleware' =>['auth']], function () {
  
  Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout'); 
  
  $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  $this->post('register', 'Auth\RegisterController@register');
  Route::get('activate/{token}', 'Auth\RegisterController@activate')
      ->name('activate');
      
     
  Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
  
  
  Route::get('home', 'homeController@index')->name('home')->middleware('role:authenticated');;

 Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard')->middleware('role:planta;administrador');
 Route::get('chartRecepcion', 'Admin\DashboardController@indexRecepcion')->name('chartRecepcion')->middleware('role:planta;administrador');
 Route::get('chartStock', 'Admin\DashboardController@indexStock')->name('chartStock')->middleware('role:planta;administrador');
 Route::get('chartIngreso', 'Admin\DashboardController@indexIngreso')->name('chartIngreso')->middleware('role:planta;administrador');
 Route::get('chartIngresoCera', 'Admin\DashboardController@indexIngresoCera')->name('chartIngresoCera')->middleware('role:planta;administrador');
 Route::get('chartIngresoInventario', 'Admin\DashboardController@indexIngresoInventario')->name('chartIngresoInventario')->middleware('role:planta;administrador');
      
 Route::resource('users', 'Admin\UserController')->middleware('role:administrador');;
 //Route::get('users', 'Admin\UserController@index')
 Route::resource('Afiliado', 'AfiliadoController')->middleware('role:administrador');


  //route grupo 
    Route::get('Ubicacion','UbicacionController@index')->middleware('role:planta;administrador');
    Route::get('Estanon','EstanonController@index')->middleware('role:planta;administrador');
    Route::get('AfiliadoApiario','AfiliadoApiarioController@index')->middleware('role:planta;administrador');
    Route::get('Apiario' , 'ApiarioController@index')->middleware('role:planta;administrador');
    Route::get('RecepcionMateriaPrima','RecepcionMateriaPrimaController@index')->middleware('role:planta;administrador');
    Route::resource('Ingreso' , 'IngresoController')->middleware('role:planta;administrador');
    Route::resource('IngresoCera' , 'IngresoCeraController')->middleware('role:planta;administrador');
    Route::resource('IngresoInventario' , 'IngresoInventarioController')->middleware('role:planta;administrador');
    Route::get('Cera','CeraController@index')->middleware('role:planta;administrador');
    Route::get('Producto' , 'ProductoController@index')->middleware('role:planta;administrador');
    Route::get('RecepEstanon' , 'RecepcionEstanonController@index')->middleware('role:planta;administrador');
    Route::get('Stock' , 'StockController@index')->middleware('role:planta;administrador');
    Route::get('Presentacion' , 'PresentacionController@index')->middleware('role:planta;administrador');



  
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
Route::POST('editAfiliadoApiario','AfiliadoApiarioController@editAfiliadoApiario');
Route::POST('deleteAfiliadoApiario','AfiliadoApiarioController@deleteAfiliadoApiario');
Route::POST('addCera','CeraController@addCera');
Route::POST('editCera','CeraController@editCera');
Route::POST('deleteCera','CeraController@deleteCera');
Route::POST('agregar','CeraController@agregar');
Route::POST('addEstanon','EstanonController@addEstanon');
Route::POST('editEstanon','EstanonController@editEstanon');
Route::POST('deleteEstanon','EstanonController@deleteEstanon');
Route::POST('addRecepcion','RecepcionEstanonController@addRecepcion');
Route::POST('editRecepcion','RecepcionEstanonController@editRecepcion');
Route::POST('deleteRecepcion','RecepcionEstanonController@deleteRecepcion');
Route::POST('addUser','Auth\RegisterController@addUser');
Route::POST('editUser','Admin\UserController@editUser');
Route::POST('deleteUser','Admin\UserController@deleteUser');
Route::POST('addProducto','ProductoController@addProducto');
Route::POST('editProducto','ProductoController@editProducto');
Route::POST('deleteProducto','ProductoController@deleteProducto');
Route::POST('addUbicacion','UbicacionController@addUbicacion');
Route::POST('editUbicacion','UbicacionController@editUbicacion');
Route::POST('deleteUbicacion','UbicacionController@deleteUbicacion');
Route::POST('addStock','StockController@addStock');
Route::POST('editStock','StockController@editStock');
Route::POST('deleteStock','StockController@deleteStock');
Route::POST('addPresentacion','PresentacionController@addPresentacion');
Route::POST('editPresentacion','PresentacionController@editPresentacion');
Route::POST('deletePresentacion','PresentacionController@deletePresentacion');
});
 
$this->get('/verify-user/{code}', 'Auth\RegisterController@activateUser')->name('activate.user');
//Route::get('IngresoCera' , 'IngresoCeraController@index');
Route::get('test', ['as' => 'test', 'uses' => 'AlertController@index']);
 $this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  $this->post('register', 'Auth\RegisterController@register');
