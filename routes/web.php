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
Route::group(['middleware' =>['auth',  'verified']], function () {
  
  Route::resources([
'Estanon'=>'EstanonController',
'Genero'=>'GeneroController',
'EstadoCivil'=>'EstadoCivilController',
'Ubicacion'=>'UbicacionController',
'Afiliado' =>'AfiliadoController',
'AfiliadoApiario'=>'AfiliadoApiarioController',
'Apiario' => 'ApiarioController',
'Usuario'=>'UserController',
'Rol'=>'RolController',
'Estado'=>'EstadoController',
'RecepcionMateriaPrima'=> 'RecepcionMateriaPrimaController',
'Ingreso' => 'IngresoController',
'admin/permissions' => 'Admin\PermissionsController',
'roles'=> 'Admin\RolesController',
'users'=> 'Admin\UsersController',

  ]);

  Route::get('permissions', function (Illuminate\Http\Request  $request) {
    $term = $request->term ?: '';
     $permissions = App\Permissions::where('name', 'like', $term.'%')->lists('name', 'name');
     $valid_permissions = [];
     foreach ($permissions as $name => $permission) {
        $valid_permissions[] = ['name' => $name, 'text' => $permission];
     }
    return \Response::json($valid_permissions);
  });
 
  Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
  Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
  Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
Route::get('generos/{id}/destroy', 'GeneroController@destroy')->name('generos.destroy');

Route::POST('addAfiliado','AfiliadoController@addAfiliado');
Route::POST('editAfiliado','AfiliadoController@editAfiliado');
Route::POST('deleteAfiliado','AfiliadoController@deleteAfiliado');

Route::POST('addRole','Admin\RolesController@addRole');
Route::POST('admin\editRol','Admin\RolesController@editRole');
Route::POST('deleteRol','Admin\RolesController@deleteRole');

Route::get('find', 'ApiarioController@find');
Route::POST('addApiario','ApiarioController@addApiario');
Route::POST('editApiario','ApiarioController@editApiario');
Route::POST('deleteApiario','ApiarioController@deleteApiario');

Route::POST('addUser','Admin\UsersController@addUser');
Route::POST('editUser','Admin\UsersController@editUser');
Route::POST('deleteUser','Admin\UsersController@deleteUser');


Route::POST('addUbicacion','UbicacionController@addUbicacion');
Route::POST('editUbicacion','UbicacionController@editUbicacion');
Route::POST('deleteUbicacion','UbicacionController@deleteUbicacion');

});


  
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


