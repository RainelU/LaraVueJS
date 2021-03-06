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

/* MODULO USUARIOS / CONTROLADORES*/
Route::post('/administracion/usuario/setRegistrarUsuario', 'AdmUsersController@setRegistrarUsuarios');
Route::get('/administracion/usuario/getUsuarios', 'AdmUsersController@getUsuarios');
Route::post('/archivo/setRegistrarArchivo', 'FilesController@setRegistrarUsuarios');
Route::post('/administracion/usuario/setEditarUsuario', 'AdmUsersController@setEditarUsuarios');
Route::post('/administracion/usuario/setCambiarEstadoUsuario', 'AdmUsersController@setCambiarEstadoUsuarios');


/* MODULO ROLES / CONTROLADORES*/
Route::get('/administracion/rol/getRoles', 'AdmRolesController@getRoles');
Route::get('/administracion/rol/getListarPermisosByRol', 'AdmRolesController@getListarPermisosByRol');
Route::post('/administracion/rol/setRegistrarRolPermisos', 'AdmRolesController@setRegistrarRolPermisos');
Route::post('/administracion/rol/setEditarRolPermisos', 'AdmRolesController@setEditarRolPermisos');


/* MODULO PERMISOS / CONTROLADORES*/
Route::get('/administracion/permiso/getPermisos', 'PermissionsController@getPermisos');
Route::post('/administracion/permiso/setRegistrarPermisos', 'PermissionsController@setRegistrarPermisos');


Route::get('/{optional?}', function () {
    return view('apps');
})  ->name('basepath')
    ->where('optional', '.*');

