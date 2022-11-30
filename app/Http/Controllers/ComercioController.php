<?php

namespace App\Http\Controllers;

use App\Models\Comercio;
use Illuminate\Http\Request;

class ComercioController extends Controller
{
    //
    //retornar todos los valores
    public function index()
    {
        return Comercio::all();
    }
    //retornar un valor por id
    public function show($id)
    {
        return Comercio::find($id);
    }
    //crear nuevo usuario
    public function store(Request $request)
    {
        return Comercio::create($request->all());
    }
    //actualizar usuario
    public function update(Request $request, $id)
    {
        $comercio = Comercio::findOrFail($id);
        $comercio->update($request->all());
        return $comercio;
    }
    //eliminar usuario
    public function destroy($id)
    {
        $comercio = Comercio::findOrFail($id);
        $comercio->delete();
        return 204;
    }
}
