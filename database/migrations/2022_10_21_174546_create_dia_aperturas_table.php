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
        Schema::create('dia_aperturas', function (Blueprint $table) {
            $table->id();
            //el idComercio de la tabla Comercio.
            $table->unsignedBigInteger('idComercio');
            //definimos la clave foranea con la tabla Comercio
            $table->foreign('idComercio')->references('id')->on('comercios');
            $table->date('dia');
            $table->enum('estado', ['ABIERTO', 'CERRADO']);
            $table->enum('visible', ['SI', 'NO']);
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
        Schema::dropIfExists('dia_aperturas');
    }
};
