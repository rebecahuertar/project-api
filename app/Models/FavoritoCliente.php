<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritoCliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'idCliente',
        'idComercio',
        'verMensajes'
    ];
}
