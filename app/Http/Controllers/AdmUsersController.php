<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
