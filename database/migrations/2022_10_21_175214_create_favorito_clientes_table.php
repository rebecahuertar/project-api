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
        Schema::create('favorito_clientes', function (Blueprint $table) {
            $table->id();
            //el idCliente de la tabla Clientes.
            $table->unsignedBigInteger('idCliente');
            //definimos la clave foranea con la tabla Clientes
            $table->foreign('idCliente')->references('id')->on('clientes');
            //el idComercio de la tabla Comercio.
            $table->unsignedBigInteger('idComercio');
            //definimos la clave foranea con la tabla Comercio
            $table->foreign('idComercio')->references('id')->on('comercios');
            $table->enum('verMensajes', ['SI', 'NO']);
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
        Schema::dropIfExists('favorito_clientes');
    }
};
