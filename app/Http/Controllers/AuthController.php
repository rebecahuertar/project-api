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
}
