<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Comercio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComercioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('comercios')->insert([
            'id' => '2',
            'nombreComercio' => 'SuperMarket Rustika',
            'descripcion' => 'Tienda de alimentación que vende diversos productos alimenticios.',
            'imagen' => '',
            'direccion' => 'Calle Enfermera Angelina Nº 56',
            'idMunicipio' => '628',
            'idProvincia' => '3',
            'codigopostal' => '03005',
            'web' => 'wwww.superRustika.com',
            'telefono' => '965 123 456',
        ]);

        DB::table('comercios')->insert([
            'id' => '3',
            'nombreComercio' => 'Zapatería Pedro',
            'descripcion' => 'Tienda de zapatos y complementos.',
            'imagen' => '',
            'direccion' => 'Calle Doctor Jiménez Nº 14',
            'idMunicipio' => '4786',
            'idProvincia' => '3',
            'codigopostal' => '06235',
            'web' => '',
            'telefono' => '612 34 56 89',
        ]);

        DB::table('comercios')->insert([
            'id' => '4',
            'nombreComercio' => 'Supermercado Verdes',
            'descripcion' => 'Tienda de alimentación que vende diversos productos alimenticios.',
            'imagen' => '',
            'direccion' => 'Calle Mayor Nº 25',
            'idMunicipio' => '628',
            'idProvincia' => '3',
            'codigopostal' => '03004',
            'web' => 'www.verdes.es',
            'telefono' => '611 44 57 99',
        ]);

        DB::table('comercios')->insert([
            'id' => '5',
            'nombreComercio' => 'Juguetería Molko',
            'descripcion' => 'Tienda de juguetes y regalos.',
            'imagen' => '',
            'direccion' => 'Calle Constitución Nº 89',
            'idMunicipio' => '628',
            'idProvincia' => '3',
            'codigopostal' => '06235',
            'web' => '',
            'telefono' => '655 55 56 89',
        ]);
    }
}
