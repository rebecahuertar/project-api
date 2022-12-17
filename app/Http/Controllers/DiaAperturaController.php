<?php

namespace App\Http\Controllers;

use App\Models\DiaApertura;
use Illuminate\Http\Request;

class DiaAperturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['show', 'showDias', 'showDiasVisibles']]);
    }

    //retornar un valor por id
    public function show($id)
    {
        $dia = DiaApertura::find($id);

        if ($dia) {
            return response()->json([
                'idDia' => $dia->id,
                'idComercio' => $dia->idComercio,
                'dia' => $dia->dia,
                'estado' => $dia->estado,
                'visible' => $dia->visible,
            ]);
        } else {
            return response()->json(['message' => 'No existe este horario con ese id.'], 401);
        }
    }

    //retornar un valor por idComercio para la parte del comercio-cuenta
    public function showDias($idComercio)
    {
        $dias = DiaApertura::where('idComercio', $idComercio)->get();

        if ($dias) {
            return $dias;
        } else {
            return response()->json(['message' => 'No existen dias de apertura con ese idComercio.'], 401);
        }
    }

    //retornar un valor por idComercio para la parte del cliente, que solo tiene que ver los que estan
    //en visible='SI'
    public function showDiasVisibles($idComercio)
    {
        $dias = DiaApertura::where([
            ['idComercio', $idComercio],
            ['visible', 'SI'],
        ])->get();

        if ($dias) {
            return $dias;
        } else {
            return response()->json(['message' => 'No existen dias de apertura con ese idComercio.'], 401);
        }
    }
    //crear nuevo dia
    public function store(Request $request)
    {
        $dia = DiaApertura::create($request->all());
        return $dia;
    }

    //actualizar dia
    public function update(Request $request, $id)
    {
        $dia = DiaApertura::findOrFail($id);
        $dia->update([
            'idComercio' => $request['idComercio'],
            'dia' => $request['dia'],
            'estado' => $request['estado'],
            'visible' => $request['visible'],
        ]);

        return response()->json(['message' => 'Actualizado correctamente.']);
    }


    //eliminar dia
    public function destroy($idDia)
    {

        $dia = DiaApertura::findOrFail($idDia);
        $dia->delete();
        return 204;
    }
}
