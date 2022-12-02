<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Comercio;
use Illuminate\Http\Request;

class ComercioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store']]);
    }

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
        $existEmail = User::where('email', $request->email)->first();
        if ($existEmail) {
            return response()->json(['message' => 'El Email ya está dado de alta.'], 401);
        }
        //codificamos el password antes de crear el registro.
        $request['password'] = bcrypt($request->input('password'));

        $user = User::create([
            'nombre' => $request['nombre'],
            'apellidos' => $request['apellidos'],
            'email' => $request['email'],
            'password' => $request['password'],
            'tipoUsuario' => $request['tipoUsuario'],
            'activo' => $request['activo'],
        ]);

        if ($user) {
            //cogemos el id de user que se ha creado para insertarlo en la tabla de cliente
            $comercio = Comercio::create([
                'id' => $user->id,
                'nombreComercio' => $request['nombreComercio'],
                'descripcion' => $request['descripcion'],
                'direccion' => $request['direccion'],
                'idMunicipio' => $request['idMunicipio'],
                'idProvincia' => $request['idProvincia'],
                'codigopostal' => $request['codigopostal'],
                'web' => $request['web'],
                'telefono' => $request['telefono'],
            ]);
            if (!$comercio) {
                //que pasa si da error, tengo que borrar el user creado?????
                response()->json(['message' => 'Ha ocurrido un error en la creación del usuario.'], 401);
            }
        } else {
            response()->json(['message' => 'Ha ocurrido un error en la creación del usuario.'], 401);
        }


        return response()->json([
            'message' => 'Usuario comercio registrado correctamente.'
        ]);
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
