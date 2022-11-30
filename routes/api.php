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

//rutas cliente
Route::get('clientes', [ClienteController::class, 'index']);
Route::get('cliente/{id}', [ClienteController::class, 'show']);
Route::post('cliente', [ClienteController::class, 'store']);

//rutas provincias
Route::get('provincia', [ProvinciaController::class, 'index']);

//rutas municipio
Route::get('municipio/{id}', [MunicipioController::class, 'show']);




//rutas categorias
Route::resource('categoria', CategoriaController::class);

//rutas comercio
Route::resource('comercio', ComercioController::class);





//Route::get('api/noticias/{pagina}', [ApiController::class, 'noticias']);
//Route::get('api/noticia/{idNoticia}', [ApiController::class, 'noticia']);
