<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_comercios', function (Blueprint $table) {
            $table->id();
            //el idCategoria de la tabla Categorias.
            $table->unsignedBigInteger('idCategoria');
            //definimos la clave foranea con la tabla Categorias
            $table->foreign('idCategoria')->references('id')->on('categorias');
            //el idComercio de la tabla Comercio.
            $table->unsignedBigInteger('idComercio');
            //definimos la clave foranea con la tabla Comercio
            $table->foreign('idComercio')->references('id')->on('comercios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_comercios');
    }
};
