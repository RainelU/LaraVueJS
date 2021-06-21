<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function setRegistrarUsuarios(Request $request){
        $file = $request->file;
        $random = Str::random(10);

        $filename = $file->getClientOriginalName();
        $fileserver = $random . '_' . $filename;

        Storage::putFileAs('public/users', $file, $fileserver);

        $response = DB::select('call sp_Archivo_setRegistrarUsuarios (?, ?)',  [
                                                                                asset('storage/users/' . $fileserver), 
                                                                                $filename
                                                                            ]);
        return $response;
    }
}
