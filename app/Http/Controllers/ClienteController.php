<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //retornar todos los valores
    public function index()
    {
        return Cliente::all();
    }
    //retornar un valor por id
    public function show($id)
    {
        return Cliente::find($id);
    }
    //crear nuevo usuario
    public function store(Request $request)
    {
        return Cliente::create($request->all());
    }
    //actualizar usuario
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return $cliente;
    }
    //eliminar usuario
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return 204;
    }
}
