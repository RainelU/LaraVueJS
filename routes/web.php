<?php

use Illuminate\Support\Facades\Route;

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
Route::post('/administracion/usuario/setRegistrarUsuario', 'AdmUsersController@setRegistrarUsuarios');
Route::get('/administracion/usuario/getUsuarios', 'AdmUsersController@getUsuarios');
Route::post('/archivo/setRegistrarArchivo', 'FilesController@setRegistrarUsuarios');
Route::post('/administracion/usuario/setEditarUsuario', 'AdmUsersController@setEditarUsuarios');
Route::post('/administracion/usuario/setCambiarEstadoUsuario', 'AdmUsersController@setCambiarEstadoUsuarios');

Route::get('/administracion/rol/getRoles', 'AdmRolesController@getRoles');
Route::get('/administracion/rol/getListarPermisosByRol', 'AdmRolesController@getListarPermisosByRol');
Route::post('/administracion/rol/setRegistrarRolPermisos', 'AdmRolesController@setRegistrarRolPermisos');


Route::get('/{optional?}', function () {
    return view('apps');
})  ->name('basepath')
    ->where('optional', '.*');

