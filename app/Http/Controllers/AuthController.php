<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['message' => 'Usuario o Password incorrecto. Vuelva a intentarlo.'], 401);
        } else {
            $user = Auth::user();
        }
        return $this->respondWithToken($token, $user);
    }

    protected function respondWithToken($token, $user)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user_id' => $user->id,
            'tipo_usuario' => $user->tipoUsuario,
        ]);
    }


    public function logout()
    {

        auth()->logout();
        return response()->json(['message' => 'Sesión cerrada.']);
    }



    /*public function login(Request $request)
    {

        $data = json_decode($request->getContent());
        $user = User::where('email', $data->email)->first();

        if ($user) {
            if (Hash::check($data->password, $user->password)) {
                $response["user_id"] = $user->id;
                $response["tipo_usuario"] = $user->tipoUsuario;
                $token = $user->createToken("auth_token");
                $response["access_token"] = $token->plainTextToken;
                return response()->json($response);
            } else {
                return response()->json(['message' => 'Credencias incorrectas. Vuelva a intentarlo.'], 401);
            }
        } else {
            return response()->json(['message' => 'El email no esta dado de alta. Vuelva a intentarlo.'], 401);
        }
    }*/
}
