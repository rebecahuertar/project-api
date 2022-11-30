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
        Schema::create('producto_comercios', function (Blueprint $table) {
            $table->id();
            //el idComercio de la tabla Comercio.
            $table->unsignedBigInteger('idComercio');
            //definimos la clave foranea con la tabla Comercio
            $table->foreign('idComercio')->references('id')->on('comercios');
            $table->string('producto', 20);
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
        Schema::dropIfExists('producto_comercios');
    }
};
