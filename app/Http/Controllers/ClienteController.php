<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Models\Cliente;
use App\Models\Municipio;
use App\Models\Provincia;
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
    //retornar un valor por id de un cliente
    public function show($id)
    {
        $user = User::find($id);
        $cliente = Cliente::find($id);

        if (($user) && ($cliente)) {
            //buscamos por id el nombre del municipio y provincia
            $municipio = Municipio::find($cliente->idMunicipio);
            $provincia = Provincia::find($cliente->idProvincia);

            return response()->json([
                'idCliente' => $user->id,
                'nombre' => $user->nombre,
                'apellidos' => $user->apellidos,
                'email' => $user->email,
                'password' => $user->password,
                'idMunicipio' => $cliente->idMunicipio,
                'municipio' => $municipio->municipio,
                'idProvincia' => $cliente->idProvincia,
                'provincia' => $provincia->provincia,
                'codigopostal' => $cliente->codigopostal,
            ]);
        } else {
            return response()->json(['message' => 'No existe este cliente con ese user_id.'], 401);
        }
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
                return response()->json(['message' => 'Ha ocurrido un error en la creación del usuario.'], 401);
            }
        } else {
            return response()->json(['message' => 'Ha ocurrido un error en la creación del usuario.'], 401);
        }

        return response()->json([
            'message' => 'Usuario cliente registrado correctamente.'
        ]);
    }
    //actualizar usuario
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $user->update([
            'nombre' => $request['nombre'],
            'apellidos' => $request['apellidos'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update([
            'idMunicipio' => $request['idMunicipio'],
            'idProvincia' => $request['idProvincia'],
            'codigopostal' => $request['codigopostal'],
        ]);

        return response()->json(['message' => 'Actualizado correctamente.']);
    }
}
