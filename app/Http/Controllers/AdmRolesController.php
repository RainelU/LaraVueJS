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
        $slug = ($slug == NULL) ? ($slug = '') : $urslugl;

        $response = DB::select('call sp_Rol_getRoles (?, ?)', [$nombre, $slug]);
        
        return $response;                                                                            
    }
}
