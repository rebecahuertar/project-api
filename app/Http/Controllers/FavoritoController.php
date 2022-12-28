<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use App\Models\FavoritoCliente;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store']]);
    }

    //comercios favoritos del cliente
    public function favoritos($id)
    {
        $cliente = FavoritoCliente::select('favorito_clientes.id', 'favorito_clientes.idCliente', 'favorito_clientes.idComercio', 'comercios.nombreComercio', 'favorito_clientes.verMensajes')
            ->join('comercios', 'favorito_clientes.idComercio', '=', 'comercios.id')
            ->where('favorito_clientes.idCliente', $id)
            ->get();

        if (!$cliente->isEmpty()) {
            return $cliente;
        } else {
            return response()->json(['message' => 'No hay favoritos que mostrar.'], 401);
        }
    }

    //añadir nuevo favorito de cliente
    public function storeFavorito(Request $request)
    {
        //comprobamos que no exista antes.
        $existFav = FavoritoCliente::where('idCliente', $request->idCliente)
            ->where('idComercio', $request->idComercio)
            ->first();

        if ($existFav) {
            return response()->json(['message' => 'Este cliente ya tiene este comercio como favorito'], 401);
        }

        $favorito = FavoritoCliente::create([
            'idCliente' => $request['idCliente'],
            'idComercio' => $request['idComercio'],
            'verMensajes' => $request['verMensajes'],
        ]);
        if ($favorito) {
            return $favorito;
        } else {
            return response()->json(['message' => 'Ha ocurrido un error.'], 401);
        }
    }

    //mensajes de los comercios favoritos del cliente
    public function mensajesFavoritos($id)
    {
        $mensajes = FavoritoCliente::select('favorito_clientes.id as idFavorito', 'favorito_clientes.idCliente', 'favorito_clientes.idComercio', 'comercios.nombreComercio', 'favorito_clientes.verMensajes', 'mensajes.id as idMensaje', 'mensajes.mensaje', 'mensajes.visible', 'mensajes.updated_at')
            ->join('comercios', 'favorito_clientes.idComercio', '=', 'comercios.id')
            ->join('mensajes', 'mensajes.idComercio', '=', 'comercios.id')
            ->where('favorito_clientes.idCliente', $id)
            ->where('favorito_clientes.verMensajes', "SI")
            ->where('mensajes.visible', "SI")
            ->orderby('updated_at')
            ->get();

        if (!$mensajes->isEmpty()) {
            return $mensajes;
        } else {
            return response()->json(['message' => 'No hay mensajes de comercios favoritos.'], 401);
        }
    }


    //actualizar favorito para ver o no sus mensajes
    //segun el valor que llega desde verMensajes, puede ser un SI o No.
    public function updateMensajesfavoritos(Request $request, $id)
    {

        $favorito = FavoritoCliente::where('id', $id)->firstOrFail();
        $favorito->update([
            'verMensajes' => $request['verMensajes'],
        ]);

        return response()->json(['message' => 'Actualizado correctamente.']);
    }

    //comprobar si el cliente ya tiene como favorito ese comercio.
    public function comprobarFavorito($idCliente, $idComercio)
    {

        $existFav = FavoritoCliente::where('idCliente', $idCliente)
            ->where('idComercio', $idComercio)
            ->first();

        if ($existFav) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }

    //eliminar comercio favorito del cliente
    public function destroyfavorito($idCliente, $idComercio)
    {

        FavoritoCliente::where('idCliente', $idCliente)->where('idComercio', $idComercio)->firstOrFail()->delete();

        //return response()->json(['message' => 'Eliminado favorito.']);
        return 204;
    }
}
