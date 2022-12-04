<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(ComercioSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(CategoriaComercioSeeder::class);
        $this->call(FavoritosclienteSeeder::class);
        $this->call(DiaAperturaSeeder::class);
        $this->call(HorarioSeeder::class);
        $this->call(ProductoComercioSeeder::class);
        $this->call(MensajesSeeder::class);
    }
}
