<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    //mostrar todas las categorias
    public function index()
    {
        return Categoria::all();
    }

    //mostrar una categoria por id
    public function show($id)
    {
        return Categoria::find($id);
    }
}
