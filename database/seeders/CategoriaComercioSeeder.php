<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use app\Models\CategoriaComercio;


class CategoriaComercioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_comercios')->insert([
            'idCategoria' => '1',
            'idComercio' => '2',
        ]);
        DB::table('categoria_comercios')->insert([
            'idCategoria' => '5',
            'idComercio' => '3',
        ]);
        DB::table('categoria_comercios')->insert([
            'idCategoria' => '1',
            'idComercio' => '4',
        ]);
        DB::table('categoria_comercios')->insert([
            'idCategoria' => '10',
            'idComercio' => '5',
        ]);
    }
}
