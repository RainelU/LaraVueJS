<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdmRolesController extends Controller
{
    public function getRoles(Request $request)
    {
        if(!$request->ajax()){
            return redirect('/');
        }

        $nombre = $request->nombre;
        $slug = $request->slug;

        $nombre = ($nombre == NULL) ? ($nombre = '') : $nombre;
        $slug = ($slug == NULL) ? ($slug = '') : $slug;

        $response = DB::select('call sp_Rol_getRoles (?, ?)', [$nombre, $slug]);
        
        return $response;                                                                            
    }

    public function getListarPermisosByRol(Request $request)
    {
        if(!$request->ajax()){
            return redirect('/');
        }

        $response = DB::select('call sp_Rol_getListarPermisosByRol');
        
        return $response;                                                                            
    }

    public function setRegistrarRolPermisos(Request $request){
        if(!$request->ajax()){
            return redirect('/');
        }

        $nombre = $request->nombre;
        $slug = $request->slug;

        $nombre = ($nombre == NULL) ? ($nombre = '') : $nombre;
        $slug = ($slug == NULL) ? ($slug = '') : $slug;

        

        try {
            //Dentro ira todo el código que deseamos realizar
            DB::beginTransaction();

            $response = DB::select('call sp_Rol_setRegistrarRol (?, ?)', [$nombre, $slug]);
        
            $idRol = $response[0]->idRol;

            $PermisosFilter = $request->PermisosFilter;
            $PermisosSize = sizeof($PermisosFilter);

            if($PermisosSize > 0){
                foreach ($PermisosFilter as $key => $value) {
                    if($value['checked'] == true){
                        $response = DB::select('call sp_Rol_setRegistrarRolPermisos (?, ?)', [$idRol, $value['id']]);
                    }
                }
            }

            DB::commit();

        } catch (Exception $e) {
            //Ira todos los errores que aparezcan en "try"
            DB::rollBack();
        }
    }
}
