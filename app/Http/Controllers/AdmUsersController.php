<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdmUsersController extends Controller
{
    public function getUsuarios(Request $request)
    {
        if(!$request->ajax()){
            return redirect('/');
        }

        $nombre = $request->nombre;
        $usuario = $request->usuario;
        $correo = $request->correo;
        $estado = $request->estado;

        $nombre = ($nombre == NULL) ? ($nombre = '') : $nombre;
        $usuario = ($usuario == NULL) ? ($usuario = '') : $usuario;
        $correo = ($correo == NULL) ? ($correo = '') : $correo;
        $estado = ($estado == NULL) ? ($estado = '') : $estado;

        $response = DB::select('call sp_Usuario_getUsuarios (?, ?, ?, ?)',  [
                                                                                $nombre, 
                                                                                $usuario, 
                                                                                $correo, 
                                                                                $estado
                                                                            ]);
        return $response;
    }

    public function setRegistrarUsuarios(Request $request){
        if(!$request->ajax()){
            return redirect('/');
        }

        $primerNombre = $request->primerNombre;
        $segundoNombre = $request->segundoNombre;
        $apellido = $request->apellido;
        $usuario = $request->usuario;
        $correo = $request->correo;
        $password = Hash::make($request->password);
        $fotografia = $request->fotografia;

        $primerNombre = ($primerNombre == NULL) ? ($primerNombre = '') : $primerNombre;
        $segundoNombre = ($segundoNombre == NULL) ? ($segundoNombre = '') : $segundoNombre;
        $apellido = ($apellido == NULL) ? ($apellido = '') : $apellido;
        $usuario = ($usuario == NULL) ? ($usuario = '') : $usuario;
        $correo = ($correo == NULL) ? ($correo = '') : $correo;
        $password = ($password == NULL) ? ($password = '') : $password;
        $fotografia = ($fotografia == NULL) ? ($fotografia = '') : $fotografia;

        $response = DB::select('call sp_Usuario_setRegistrarUsuarios (?, ?, ?, ?, ?, ?, ?)',  [
                                                                                $primerNombre, 
                                                                                $segundoNombre, 
                                                                                $apellido, 
                                                                                $usuario,
                                                                                $correo,
                                                                                $password,
                                                                                $fotografia
                                                                            ]);
        return $response;   
    }
}
