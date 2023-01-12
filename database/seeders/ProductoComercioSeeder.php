<?php

namespace Database\Seeders;

use App\Models\ProductoComercio;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoComercioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producto_comercios')->insert([
            'idComercio' => '2',
            'producto' => 'Pan'
        ]);
        DB::table('producto_comercios')->insert([
            'idComercio' => '2',
            'producto' => 'Fruta'
        ]);
        DB::table('producto_comercios')->insert([
            'idComercio' => '2',
            'producto' => 'Bollería'
        ]);
        DB::table('producto_comercios')->insert([
            'idComercio' => '2',
            'producto' => 'Papel'
        ]);
        DB::table('producto_comercios')->insert([
            'idComercio' => '2',
            'producto' => 'Bebida'
        ]);
        DB::table('producto_comercios')->insert([
            'idComercio' => '3',
            'producto' => 'Zapatos'
        ]);
        DB::table('producto_comercios')->insert([
            'idComercio' => '4',
            'producto' => 'Pan'
        ]);
        DB::table('producto_comercios')->insert([
            'idComercio' => '4',
            'producto' => 'Fruta'
        ]);
        DB::table('producto_comercios')->insert([
            'idComercio' => '5',
            'producto' => 'Muñecas'
        ]);
    }
}
