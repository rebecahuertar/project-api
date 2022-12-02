<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['store']]);
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
            $cliente = Cliente::create([
                'id' => $user->id,
                'idMunicipio' => $request['idMunicipio'],
                'idProvincia' => $request['idProvincia'],
                'codigopostal' => $request['codigopostal'],
            ]);
            if (!$cliente) {
                //que pasa si da error, tengo que borrar el user creado?????
                response()->json(['message' => 'Ha ocurrido un error en la creación del usuario.'], 401);
            }
        } else {
            response()->json(['message' => 'Ha ocurrido un error en la creación del usuario.'], 401);
        }

        return response()->json([
            'message' => 'Usuario cliente registrado correctamente.'
        ]);
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
