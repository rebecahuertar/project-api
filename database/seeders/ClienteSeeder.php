<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'id' => '6',
            'idMunicipio' => '628',
            'idProvincia' => '3',
            'codigopostal' => '03005',
        ]);

        DB::table('clientes')->insert([
            'id' => '7',
            'idMunicipio' => '628',
            'idProvincia' => '3',
            'codigopostal' => '03004',
        ]);

        DB::table('clientes')->insert([
            'id' => '8',
            'idMunicipio' => '4786',
            'idProvincia' => '3',
            'codigopostal' => '02005',
        ]);
    }
}
