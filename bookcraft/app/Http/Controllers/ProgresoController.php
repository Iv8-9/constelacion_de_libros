<?php

namespace App\Http\Controllers;

use App\Models\Progreso;
use Illuminate\Http\Request;

class ProgresoController extends Controller
{
    public function index()
    {
        $progreso = Progreso::all();
    }

    public function show(Request $request)
    {
        $progreso = Progreso::where('id',$request->id)->get();
    }

    public function store(Request $request)
    {
        if($request->id==0){
            $progreso = new Progreso();
        }else{
            $progreso = Progreso::find($request->id);
        }
        $progreso->id_libro = $request->id_libro;
        $progreso->id_lector = $request->id_lector;
        $progreso->id_estatus = $request->id_estatus;
        $progreso->save();
    }

    public function destroy(Request $request)
    {
        $progreso = Progreso::find($request->id);
        $progreso->delete();
    }
}
