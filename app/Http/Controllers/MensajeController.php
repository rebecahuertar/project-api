<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;

class MensajeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['show', 'showMensajes', 'showMensajesVisibles']]);
    }

    //retornar un valor por id
    public function show($id)
    {
        $mensaje = Mensaje::find($id);

        if ($mensaje) {
            return response()->json([
                'idMensaje' => $mensaje->id,
                'idComercio' => $mensaje->idComercio,
                'mensaje' => $mensaje->mensaje,
                'visible' => $mensaje->visible,
            ]);
        } else {
            return response()->json(['message' => 'No existe este mensaje con ese id.'], 401);
        }
    }

    //retornar un valor por idComercio para la parte del comercio
    public function showMensajes($idComercio)
    {
        $mensajes = Mensaje::where('idComercio', $idComercio)->get();

        if ($mensajes) {
            return $mensajes;
        } else {
            return response()->json(['message' => 'No existen mensajes con ese idComercio.'], 401);
        }
    }

    //retornar un valor por idComercio para la parte del cliente, que solo tiene que ver los que estan
    //en visible='SI'
    public function showMensajesVisibles($idComercio)
    {
        $mensajes = Mensaje::where([
            ['idComercio', $idComercio],
            ['visible', 'SI'],
        ])->get();

        if ($mensajes) {
            return $mensajes;
        } else {
            return response()->json(['message' => 'No existen mensajes con ese idComercio.'], 401);
        }
    }

    public function store(Request $request)
    {
        $mensaje = Mensaje::create($request->all());
        return $mensaje;
    }

    public function update(Request $request, $id)
    {
        $mensaje = Mensaje::findOrFail($id);
        $mensaje->update([
            'idComercio' => $request['idComercio'],
            'mensaje' => $request['mensaje'],
            'visible' => $request['visible'],
        ]);

        return response()->json(['message' => 'Actualizado correctamente.']);
    }

    public function destroy($idMensaje)
    {

        $mensaje = Mensaje::findOrFail($idMensaje);
        $mensaje->delete();
        return 204;
    }
}
