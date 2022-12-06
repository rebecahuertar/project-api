<?php

namespace App\Http\Controllers;

use App\Models\CategoriaComercio;
use App\Models\User;
use App\Models\Categoria;
use App\Models\Comercio;
use App\Models\Municipio;
use App\Models\Provincia;
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
        $user = User::find($id);
        $comercio = Comercio::find($id);
        $categoriacom = CategoriaComercio::where('idComercio', $id)->first();


        if (($user) && ($comercio)) {
            //buscamos por id el nombre del municipio, provincia y categoria
            $municipio = Municipio::find($comercio->idMunicipio);
            $provincia = Provincia::find($comercio->idProvincia);
            $categoria = Categoria::where('id', $categoriacom->idCategoria)->first();

            return response()->json([
                'idComercio' => $user->id,
                'nombre' => $user->nombre,
                'apellidos' => $user->apellidos,
                'email' => $user->email,
                'password' => $user->password,
                'nombreComercio' => $comercio->nombreComercio,
                'descripcion' => $comercio->descripcion,
                'direccion' => $comercio->direccion,
                'idCategoria' => $categoriacom->idCategoria,
                'categoria' => $categoria->nombre,
                'idMunicipio' => $comercio->idMunicipio,
                'municipio' => $municipio->municipio,
                'idProvincia' => $comercio->idProvincia,
                'provincia' => $provincia->provincia,
                'codigopostal' => $comercio->codigopostal,
                'web' => $comercio->web,
                'telefono' => $comercio->telefono,
            ]);
        } else {
            return response()->json(['message' => 'No existe este comercio con ese user_id.'], 401);
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
            //añadimos la categoria del comercio en la tabla categoria_comercios
            $categoria = CategoriaComercio::create([
                'idCategoria' => $request['idCategoria'],
                'idComercio' => $user->id,
            ]);
            if (!$categoria) {
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
        $user = User::findOrFail($id);
        $user->update([
            'nombre' => $request['nombre'],
            'apellidos' => $request['apellidos'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $comercio = Comercio::findOrFail($id);
        $comercio->update([
            'nombreComercio' => $request['nombreComercio'],
            'descripcion' => $request['descripcion'],
            'direccion' => $request['direccion'],
            'idMunicipio' => $request['idMunicipio'],
            'idProvincia' => $request['idProvincia'],
            'codigopostal' => $request['codigopostal'],
            'web' => $request['web'],
            'telefono' => $request['telefono'],
        ]);

        $categoriacom = CategoriaComercio::where('idComercio', $id)->first();
        $categoriacom->update([
            'idCategoria' => $request['idCategoria'],
        ]);

        return response()->json(['message' => 'Actualizado correctamente.']);
    }
    //eliminar usuario
    public function destroy($id)
    {
        $comercio = Comercio::findOrFail($id);
        $comercio->delete();
        return 204;
    }
}
