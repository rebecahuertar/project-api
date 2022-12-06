<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProvinciaController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\ComercioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HorarioController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//rutas auth
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout']);

//rutas user
Route::get('users', [UserController::class, 'index']);
Route::post('user', [UserController::class, 'store']);
Route::get('user/{id}', [UserController::class, 'show']);

//rutas comercio
Route::get('comercio', [ComercioController::class, 'index']);
Route::get('comercio/{id}', [ComercioController::class, 'show']);
Route::post('comercio', [ComercioController::class, 'store']);
Route::put('comercio/{id}', [ComercioController::class, 'update']);

//rutas horarios
Route::get('horario/{id}', [HorarioController::class, 'show']);
Route::get('horarios/{idComercio}', [HorarioController::class, 'showHorarios']);
Route::post('horario', [HorarioController::class, 'store']);
Route::put('horario/{id}', [HorarioController::class, 'update']);
Route::delete('horario/{id}', [HorarioController::class, 'destroy']);


//rutas cliente
Route::get('clientes', [ClienteController::class, 'index']);
Route::get('cliente/{id}', [ClienteController::class, 'show']);
Route::post('cliente', [ClienteController::class, 'store']);
Route::put('cliente/{id}', [ClienteController::class, 'update']);
Route::get('cliente/favoritos/{idCliente}', [ClienteController::class, 'favoritos']);
Route::delete('cliente/favorito/{idCliente}/{idComercio}', [ClienteController::class, 'destroy']);


//rutas categorias
Route::get('categoria', [CategoriaController::class, 'index']);
Route::get('categoria/{id}', [CategoriaController::class, 'show']);

//rutas provincias
Route::get('provincia', [ProvinciaController::class, 'index']);
Route::get('provincia/{id}', [ProvinciaController::class, 'show']);

//rutas municipio
Route::get('municipio/{id}', [MunicipioController::class, 'show']);
Route::get('municipios/{id}', [MunicipioController::class, 'showByIdProvincia']);
