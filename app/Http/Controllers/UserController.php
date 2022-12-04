<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }

    //retornar todos los valores
    /* public function index()
    {
        return User::all();
    }
    //retornar un valor por id
    public function show($id)
    {
        return User::find($id);
    */
    //crear nuevo usuario
    /* public function store(Request $request)
    {
        $existEmail = User::where('email', $request->email)->first();
        if ($existEmail) {
            return response()->json(['message' => 'El Email ya está dado de alta.'], 401);
        }
        //codificamos el password antes de crear el registro.
        $request['password'] = bcrypt($request->input('password'));
        //$user = User::create($request->all());

        $user = User::create([
            'nombre' => $request['nombre'],
            'apellidos' => $request['apellidos'],
            'email' => $request['email'],
            'password' => $request['password'],
            'tipoUsuario' => $request['tipoUsuario'],
            'activo' => $request['activo'],
        ]);

        //cogemos el id de user que se ha creado para insertarlo en la tabla de cliente
        $cliente = Cliente::create([
            'id' => $user->id,
            'idMunicipio' => $request['idMunicipio'],
            'idProvincia' => $request['idProvincia'],
            'codigopostal' => $request['codigopostal'],
        ]);

        return response()->json([
            'message' => 'Usuario registrado correctamente.'
        ]);
    }
    //actualizar usuario
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return $user;
    }
    //eliminar usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return 204;
    }*/
}
