<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoComercio extends Model
{
    use HasFactory;

    protected $fillable = [
        'idComercio',
        'producto'
    ];
}
