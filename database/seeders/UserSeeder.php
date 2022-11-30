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
            'Password' => bcrypt('R1*H2*R3'),
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
            'nombre' => 'Laura',
            'apellidos' => 'Garcia Martinez',
            'email' => 'lauragm@prueba.com',
            'password' => bcrypt('L6789074'),
            'tipoUsuario' => 'cliente',
            'activo' => 'SI'
        ]);

        DB::table('users')->insert([
            'nombre' => 'Pedro',
            'apellidos' => 'Sanchez Lopez',
            'email' => 'predrosl@prueba.com',
            'password' => bcrypt('P7902351'),
            'tipoUsuario' => 'comercio',
            'activo' => 'SI'
        ]);

        DB::table('users')->insert([
            'nombre' => 'Jose',
            'apellidos' => 'Ortiz Martinez',
            'email' => 'joseom@prueba.com',
            'password' => bcrypt('J6789055'),
            'tipoUsuario' => 'cliente',
            'activo' => 'SI'
        ]);
    }
}
