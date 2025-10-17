<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categoria = Categoria::all();
        return $categoria;
    }

    public function show(Request $request)
    {
        $categoria = Categoria::where('id',$request->id)->get();
        return $categoria;
    }

    public function store(Request $request)
    {
        if($request->id==0){
            $categoria = new Categoria();
        }else{
            $categoria = Categoria::find($request->id);
        }
        $categoria->clasificacion = $request->clasificacion;
        $categoria->estructura = $request->estructura;
        $categoria->audiencia = $request->audiencia;
        $categoria->save();
        return "Ok";
    }

    public function destroy(Request $request)
    {
        $categoria = Categoria::find($request->id);
        $categoria->delete();
        return "Ok";
    }
}
