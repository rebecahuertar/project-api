<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'nombre' => 'Rebeca',
            'apellidos' => 'Huerta Rubio',
            'email' => 'rebecahuertar@uoc.edu',
            'Password' => bcrypt('R5987456'),
            'tipoUsuario' => 'admin',
            'activo' => 'SI'
        ]);

        DB::table('users')->insert([
            'nombre' => 'Carmen',
            'apellidos' => 'Lopez Lopez',
            'email' => 'carmenll@prueba.com',
            'password' => bcrypt('C4781348'),
            'tipoUsuario' => 'comercio',
            'activo' => 'SI'
        ]);

        DB::table('users')->insert([
            'nombre' => 'Pedro',
            'apellidos' => 'Esteso Lopez',
            'email' => 'predroel@prueba.com',
            'password' => bcrypt('P7902351'),
            'tipoUsuario' => 'comercio',
            'activo' => 'SI'
        ]);

        DB::table('users')->insert([
            'nombre' => 'Juan',
            'apellidos' => 'Martinez Garcia',
            'email' => 'juanmg@prueba.com',
            'password' => bcrypt('J8354269'),
            'tipoUsuario' => 'comercio',
            'activo' => 'SI'
        ]);

        DB::table('users')->insert([
            'nombre' => 'Alba',
            'apellidos' => 'Cano Ortiz',
            'email' => 'albaco@prueba.com',
            'password' => bcrypt('A7531598'),
            'tipoUsuario' => 'comercio',
            'activo' => 'SI'
        ]);

        DB::table('users')->insert([
            'nombre' => 'Laura',
            'apellidos' => 'Garcia Martinez',
            'email' => 'lauragm@prueba.com',
            'password' => bcrypt('L6789074'),
            'tipoUsuario' => 'cliente',
            'activo' => 'SI'
        ]);

        DB::table('users')->insert([
            'nombre' => 'Antonio',
            'apellidos' => 'Haro Rubio',
            'email' => 'antoniohr@prueba.com',
            'password' => bcrypt('A9852365'),
            'tipoUsuario' => 'cliente',
            'activo' => 'SI'
        ]);

        DB::table('users')->insert([
            'nombre' => 'Inés',
            'apellidos' => 'Lopez Rubio',
            'email' => 'ineslr@prueba.com',
            'password' => bcrypt('I7462596'),
            'tipoUsuario' => 'cliente',
            'activo' => 'SI'
        ]);
    }
}
