<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
    public function index()
    {
        $editorial = Editorial::all();
        return $editorial;
    }

    public function show(Request $request)
    {
        $editorial = Editorial::where('id',$request->id)->get();
        return $editorial;
    }

    public function store(Request $request)
    {
        if($request->id==0){
            $editorial = new Editorial();
        }else{
            $editorial = Editorial::find($request->id);
        }
        $editorial->nombre_editorial = $request->nombre_editorial;
        $editorial->calle = $request->calle;
        $editorial->noExt = $request->noExt;
        $editorial->colonia = $request->colonia;
        $editorial->save();
        return "ok";
    }

    public function destroy(Request $request)
    {
        $editorial = Editorial::find($request->id);
        $editorial->delete();
        return "ok";
    }
}

