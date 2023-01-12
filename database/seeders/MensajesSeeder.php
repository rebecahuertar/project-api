<?php

namespace Database\Seeders;

use App\Models\Mensaje;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MensajesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mensajes')->insert([
            'idComercio' => '2',
            'mensaje' => 'Abrimos el próximo festivo Martes 6 de Diciembre, en horario de 9:00 a 21:00',
            'visible' => 'Si'
        ]);
        DB::table('mensajes')->insert([
            'idComercio' => '2',
            'mensaje' => 'Recuerde que tenemos todos los días pan recién hecho.',
            'visible' => 'Si'
        ]);
        DB::table('mensajes')->insert([
            'idComercio' => '2',
            'mensaje' => 'A partir del día 15 de Junio entra el nuevo horario de verano.',
            'visible' => 'NO'
        ]);
        DB::table('mensajes')->insert([
            'idComercio' => '4',
            'mensaje' => 'A partir del día 15 de Junio entra el nuevo horario de verano.',
            'visible' => 'SI'
        ]);
    }
}
