<?php

namespace App\Http\Controllers;

use App\Models\Provincia;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    //retornar todos los valores
    public function index()
    {
        return Provincia::all();
    }
    //retornar un valor por id
    public function show($id)
    {
        return Provincia::find($id);
    }
}
