<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PermissionsController extends Controller
{
    public function getPermisos(Request $request)
    {
        if(!$request->ajax()){
            return redirect('/');
        }

        $idPermiso = $request->idPermiso;
        $nombre = $request->nombre;
        $slug = $request->slug;

        $idPermiso = ($idPermiso == NULL) ? ($idPermiso = 0) : $idPermiso;
        $nombre = ($nombre == NULL) ? ($nombre = '') : $nombre;
        $slug = ($slug == NULL) ? ($slug = '') : $slug;

        $response = DB::select('call sp_Permiso_getPermisos (?, ?, ?)', [$idPermiso, $nombre, $slug]);
        
        return $response;  
    }

    public function setRegistrarPermisos(Request $request){

        
        $nombre = $request->nombre;
        $slug = $request->slug;

        
        $nombre = ($nombre == NULL) ? ($nombre = '') : $nombre;
        $slug = ($slug == NULL) ? ($slug = '') : $slug;

        DB::select('call sp_Permiso_setRegistrarPermisos (?, ?)', [$nombre, $slug]);
    }
}
