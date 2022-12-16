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
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\DiaAperturaController;
use App\Http\Controllers\ProductoComercioController;
use App\Http\Controllers\MensajeController;

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
//rutas buscador
Route::get('comercio/buscador/{dato}', [ComercioController::class, 'buscador']);

//rutas horarios
Route::get('horario/{id}', [HorarioController::class, 'show']);
Route::get('horarios/{idComercio}', [HorarioController::class, 'showHorarios']);
Route::get('horarios/visible/{idComercio}', [HorarioController::class, 'showHorariosVisibles']);
Route::post('horario', [HorarioController::class, 'store']);
Route::put('horario/{id}', [HorarioController::class, 'update']);
Route::delete('horario/{id}', [HorarioController::class, 'destroy']);

//rutas dia de apertura
Route::get('dia/{id}', [DiaAperturaController::class, 'show']);
Route::get('dias/{idComercio}', [DiaAperturaController::class, 'showDias']);
Route::get('dias/visible/{idComercio}', [DiaAperturaController::class, 'showDiasVisibles']);
Route::post('dia', [DiaAperturaController::class, 'store']);
Route::put('dia/{id}', [DiaAperturaController::class, 'update']);
Route::delete('dia/{id}', [DiaAperturaController::class, 'destroy']);

//rutas productos
Route::get('producto/{id}', [ProductoComercioController::class, 'show']);
Route::get('productos/{idComercio}', [ProductoComercioController::class, 'showProductos']);
Route::post('producto', [ProductoComercioController::class, 'store']);
Route::put('producto/{id}', [ProductoComercioController::class, 'update']);
Route::delete('producto/{id}', [ProductoComercioController::class, 'destroy']);

//rutas mensajes
Route::get('mensaje/{id}', [MensajeController::class, 'show']);
Route::get('mensajes/{idComercio}', [MensajeController::class, 'showMensajes']);
Route::get('mensajes/visible/{idComercio}', [MensajeController::class, 'showMensajesVisibles']);
Route::post('mensaje', [MensajeController::class, 'store']);
Route::put('mensaje/{id}', [MensajeController::class, 'update']);
Route::delete('mensaje/{id}', [MensajeController::class, 'destroy']);

//rutas cliente
Route::get('clientes', [ClienteController::class, 'index']);
Route::get('cliente/{id}', [ClienteController::class, 'show']);
Route::post('cliente', [ClienteController::class, 'store']);
Route::put('cliente/{id}', [ClienteController::class, 'update']);

//rutas favoritos
Route::get('favoritos/{idCliente}', [FavoritoController::class, 'favoritos']);
Route::get('favoritos/vermensajes/{idCliente}', [FavoritoController::class, 'mensajesFavoritos']);
Route::get('favorito/comprobarFav/{idCliente}/{idComercio}', [FavoritoController::class, 'comprobarFavorito']);
Route::post('favorito', [FavoritoController::class, 'storeFavorito']);
Route::put('favorito/vermensaje/{idFavorito}', [FavoritoController::class, 'updateMensajesfavoritos']);
Route::delete('favorito/{idCliente}/{idComercio}', [FavoritoController::class, 'destroyfavorito']);

//rutas categorias
Route::get('categoria', [CategoriaController::class, 'index']);
Route::get('categoria/{id}', [CategoriaController::class, 'show']);

//rutas provincias
Route::get('provincia', [ProvinciaController::class, 'index']);
Route::get('provincia/{id}', [ProvinciaController::class, 'show']);

//rutas municipio
Route::get('municipio/{id}', [MunicipioController::class, 'show']);
Route::get('municipios/{id}', [MunicipioController::class, 'showByIdProvincia']);
