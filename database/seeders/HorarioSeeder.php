<?php

namespace Database\Seeders;

use App\Models\Horario;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HorarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('horarios')->insert([
            'idComercio' => '2',
            'descripcion' => 'Lunes: 09:00 - 20:00.',
            'visible' => 'SI'
        ]);
        DB::table('horarios')->insert([
            'idComercio' => '2',
            'descripcion' => 'Martes: 09:00 - 20:00.',
            'visible' => 'SI'
        ]);
        DB::table('horarios')->insert([
            'idComercio' => '2',
            'descripcion' => 'Miércoles: 09:00 - 20:00.',
            'visible' => 'SI'
        ]);
        DB::table('horarios')->insert([
            'idComercio' => '2',
            'descripcion' => 'Jueves: 09:00 - 20:00.',
            'visible' => 'SI'
        ]);
        DB::table('horarios')->insert([
            'idComercio' => '2',
            'descripcion' => 'Viernes: 09:00 - 20:00.',
            'visible' => 'SI'
        ]);
        DB::table('horarios')->insert([
            'idComercio' => '2',
            'descripcion' => 'Sábado: 09:00 - 15:00.',
            'visible' => 'SI'
        ]);
        DB::table('horarios')->insert([
            'idComercio' => '2',
            'descripcion' => 'Domingo: 10:00 - 14:00.',
            'visible' => 'NO'
        ]);
    }
}
