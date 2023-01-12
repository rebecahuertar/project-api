<?php

namespace Database\Seeders;

use App\Models\FavoritoCliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoritosClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorito_clientes')->insert([
            'idCliente' => '6',
            'idComercio' => '2',
            'verMensajes' => 'SI'
        ]);
        DB::table('favorito_clientes')->insert([
            'idCliente' => '6',
            'idComercio' => '4',
            'verMensajes' => 'SI'
        ]);
        DB::table('favorito_clientes')->insert([
            'idCliente' => '7',
            'idComercio' => '3',
            'verMensajes' => 'SI'
        ]);
        DB::table('favorito_clientes')->insert([
            'idCliente' => '8',
            'idComercio' => '2',
            'verMensajes' => 'SI'
        ]);
        DB::table('favorito_clientes')->insert([
            'idCliente' => '8',
            'idComercio' => '4',
            'verMensajes' => 'NO'
        ]);
    }
}
