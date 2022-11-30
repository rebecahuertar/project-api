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
        Schema::create('municipios', function (Blueprint $table) {
            $table->id();
            //el idProvincia de la tabla Provincias.
            $table->unsignedBigInteger('idProvincia');
            //definimos la clave foranea con la tabla Provincias
            $table->foreign('idProvincia')->references('id')->on('provincias');
            $table->string('municipio', 200);
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
        Schema::dropIfExists('municipios');
    }
};
