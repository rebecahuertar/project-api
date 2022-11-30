<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    //
    //retornar todos los valores
    public function index()
    {
        return Municipio::all();
    }
    //retornar un valor por idProvincia
    public function show($idProvincia)
    {
        return Municipio::where('idProvincia', $idProvincia)->get();
    }
}
