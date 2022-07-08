<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\v1\Producto;

class ProductosController extends Controller
{
    function getAll()
    {
        $response = new \stdClass();
        $response->success=true;

        $productos = Producto::all();

        $response->data=$productos;
        return response()->json($response,200);
    }
    function getItem($id)
    {
        $response = new \stdClass();
        $response->success=true;

        $productos = Producto::find($id);
        $response->data = $productos;

        return response()->json($response,200);
    }
    function store(Request $request)
    {
        $response = new \stdClass();
        $response->success=true;

        $producto = new Producto();
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->save();

        $response->data=$producto;

        return response()->json($response,201);
    }
   
}    