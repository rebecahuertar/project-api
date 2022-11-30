<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categorias')->insert([
            'nombre' => 'PANADERÍAS Y ALIMENTACIÓN'
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'FARMACIAS'
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'PELUQUERÍAS'
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'PERFUMERÍAS Y DROGUERÍA'
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'ZAPATERÍAS'
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'JOYERÍAS'
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'ÓPTICAS'
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'DEPORTES'
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'ELECTRÓNICA'
        ]);
        DB::table('categorias')->insert([
            'nombre' => 'JUGUETES'
        ]);
    }
}
