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
        $libro->id_lector = $request->id_lector;
        $libro->nombre_libro = $request->nombre_libro;
        $libro->autor = $request->autor;
        $libro->genero = $request->genero;
        $libro->no_paginas = $request->no_paginas;
        $libro->fecha_termino = $request->fecha_termino;
        $libro->imagen = $request->imagen;
        $libro->personaje_favorito = $request->personaje_favorito;
        $libro->personaje_odiado = $request->personaje_odiado;
        $libro->tipo_libro = $request->tipo_libro;
        $libro->modo_lectura = $request->modo_lectura;
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
