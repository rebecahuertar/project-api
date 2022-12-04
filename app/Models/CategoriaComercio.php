<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaComercio extends Model
{
    use HasFactory;

    protected $fillable = [
        'idCategoria',
        'idComercio',
    ];
}
