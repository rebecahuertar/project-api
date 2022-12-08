<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //retornar un valor por id
    public function show($id)
    {
        $horario = Horario::find($id);

        if ($horario) {
            return response()->json([
                'idHorario' => $horario->id,
                'idComercio' => $horario->idComercio,
                'descripcion' => $horario->descripcion,
                'visible' => $horario->visible,
            ]);
        } else {
            return response()->json(['message' => 'No existe este horario con ese id.'], 401);
        }
    }

    //retornar un valor por idComercio para la parte del comercio
    public function showHorarios($idComercio)
    {
        $horarios = Horario::where('idComercio', $idComercio)->get();

        if ($horarios) {
            return $horarios;
        } else {
            return response()->json(['message' => 'No existen horarios con ese idComercio.'], 401);
        }
    }

    //retornar un valor por idComercio para la parte del cliente, que solo tiene que ver los que estan
    //en visible='SI'
    public function showHorariosVisibles($idComercio)
    {
        $horarios = Horario::where([
            ['idComercio', $idComercio],
            ['visible', 'SI'],
        ])->get();

        if ($horarios) {
            return $horarios;
        } else {
            return response()->json(['message' => 'No existen horarios con ese idComercio.'], 401);
        }
    }

    public function store(Request $request)
    {
        $horario = Horario::create($request->all());
        return $horario;
    }

    public function update(Request $request, $id)
    {
        $horario = Horario::findOrFail($id);
        $horario->update([
            'idComercio' => $request['idComercio'],
            'descripcion' => $request['descripcion'],
            'visible' => $request['visible'],
        ]);

        return response()->json(['message' => 'Actualizado correctamente.']);
    }

    public function destroy($idHorario)
    {

        $horario = Horario::findOrFail($idHorario);
        $horario->delete();
        return 204;
    }
}
