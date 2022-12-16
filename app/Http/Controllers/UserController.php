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
}
