<?php

namespace Database\Seeders;

use App\Models\DiaApertura;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiaAperturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dia_aperturas')->insert([
            'idComercio' => '2',
            'dia' => '2022-12-6',
            'estado' => 'ABIERTO',
            'visible' => 'SI'
        ]);
        DB::table('dia_aperturas')->insert([
            'idComercio' => '2',
            'dia' => '2022-12-8',
            'estado' => 'CERRADO',
            'visible' => 'SI'
        ]);
        DB::table('dia_aperturas')->insert([
            'idComercio' => '2',
            'dia' => '2022-12-11',
            'estado' => 'ABIERTO',
            'visible' => 'SI'
        ]);
        DB::table('dia_aperturas')->insert([
            'idComercio' => '4',
            'dia' => '2022-12-11',
            'estado' => 'ABIERTO',
            'visible' => 'SI'
        ]);
    }
}
