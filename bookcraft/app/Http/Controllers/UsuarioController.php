<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuario =Usuario::all();
        return $usuario;
    }

    public function show(Request $request)
    {
        $usuario =Usuario::where('id',$request->id)->get();
        return $usuario;
    }
    
    public function store(Request $request)
    {
        if($request->id == 0){ 
            $usuario = new Usuario();
        }else{
            $usuario = Usuario::find($request->id);
        }
        $usuario->name =  $request->name;
        $usuario->email =  $request->email;
        $usuario->password = Hash::make($request->password);

        $usuario->nombre_lector =  $request->nombre_lector;
        $usuario->app_lector =  $request->app_lector;
        $usuario->apm_lector =  $request->apm_lector;
        $usuario->edad =  $request->edad;
        $usuario->save();
        return 'ok';
    }

    public function destroy(Request $request)
    {
        $usuario = Usuario::find($request->id);
        $usuario->delete();
        return 'ok';
    }
}
