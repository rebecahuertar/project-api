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
            'nombre' => 'SuperMarket',
            'descripcion' => 'Tienda de alimentación',
            'imagen' => '',
            'direccion' => 'Calle Enfermera Angelina Nº 56',
            'idMunicipio' => '628',
            'idProvincia' => '3',
            'codigopostal' => '03005',
            'web' => '',
            'telefono' => '965 123 456',
        ]);

        DB::table('comercios')->insert([
            'id' => '4',
            'nombre' => 'Zapatería',
            'descripcion' => 'Tienda de zapatos y complementos',
            'imagen' => '',
            'direccion' => 'Calle Doctor Jiménez Nº 14',
            'idMunicipio' => '388',
            'idProvincia' => '3',
            'codigopostal' => '06235',
            'web' => '',
            'telefono' => '612 34 56 89',
        ]);
    }
}
