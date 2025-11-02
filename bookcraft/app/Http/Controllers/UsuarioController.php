<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
         $usuario = Usuario::all();
        return $usuario;
        
    }

    public function show(Request $request)
    {
        $usuario = usuario::where('id',$request->id)->get();
        return $usuario;
        
    }

    public function store(Request $request)
    {
        $usuario = $request->id ? Usuario::find($request->id) : new Usuario();

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->app_lector = $request->app_lector;
        $usuario->apm_lector = $request->apm_lector;
        $usuario->edad = $request->edad;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->suscripcion = $request->suscripcion;

        $usuario->save();

        return response()->json(['status' => 'ok', 'usuario' => $usuario]);
    }

      public function destroy(Request $request)
    {
        $usuario = Usuario::find($request->id);
        $usuario->delete();
        return "ok";
    }
}
