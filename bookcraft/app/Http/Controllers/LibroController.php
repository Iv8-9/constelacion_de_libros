<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    public function index()
    {
        $libro = Libro::all();
        return $libro;
    }

    public function show(Request $request)
    {
        $libro = Libro::where('id',$request->id)->get();
        return $libro;
    }

    public function store(Request $request)
    {
        if($request->id==0){
            $libro = new Libro();
        }else{
            $libro = Libro::find($request->id);
        }
        $libro->id_categoria = $request->id_categoria;
        $libro->id_editorial = $request->id_editorial;
        $libro->nombre_libro = $request->nombre_libro;
        $libro->autor = $request->autor;
        $libro->fecha_publicacion = $request->fecha_publicacion;
        $libro->save();
        return "ok";
    }

    public function destroy(Request $request)
    {
        $libro = Libro::find($request->id);
        $libro->delete();
        return "ok";
    }
}
