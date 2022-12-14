<?php

namespace App\Http\Controllers;

use App\Models\ProductoComercio;
use Illuminate\Http\Request;

class ProductoComercioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['show', 'showProductos']]);
    }

    //retornar un valor por id
    public function show($id)
    {
        $producto = ProductoComercio::find($id);

        if ($producto) {
            return response()->json([
                'idProducto' => $producto->id,
                'idComercio' => $producto->idComercio,
                'producto' => $producto->producto,
            ]);
        } else {
            return response()->json(['message' => 'No existe este producto con ese id.'], 401);
        }
    }

    //retornar un valor por idComercio
    public function showProductos($idComercio)
    {
        $productos = ProductoComercio::where('idComercio', $idComercio)->get();

        if ($productos) {
            return $productos;
        } else {
            return response()->json(['message' => 'No existen productos con ese idComercio.'], 401);
        }
    }

    public function store(Request $request)
    {
        $producto = ProductoComercio::create($request->all());
        return $producto;
    }

    public function update(Request $request, $id)
    {
        $producto = ProductoComercio::findOrFail($id);
        $producto->update([
            'idComercio' => $request['idComercio'],
            'producto' => $request['producto'],
        ]);

        return response()->json(['message' => 'Actualizado correctamente.']);
    }

    public function destroy($idProducto)
    {

        $producto = ProductoComercio::findOrFail($idProducto);
        $producto->delete();
        return 204;
    }
}
