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
        Schema::create('comercios', function (Blueprint $table) {
            $table->id();
            //definimos la clave foranea con la tabla users
            $table->foreign('id')->references('id')->on('users');
            $table->string('nombre', 100);
            $table->string('descripcion', 300)->nullable();
            $table->string('imagen', 300)->nullable();
            $table->string('direccion', 300);
            //el idMunicipio de la tabla Municipios.
            $table->unsignedBigInteger('idMunicipio');
            //definimos la clave foranea con la tabla Municipios
            $table->foreign('idMunicipio')->references('id')->on('municipios');
            //el idProvincia de la tabla Provincias.
            $table->unsignedBigInteger('idProvincia');
            //definimos la clave foranea con la tabla Provincias
            $table->foreign('idProvincia')->references('id')->on('provincias');
            $table->string('codigopostal', 5);
            $table->string('web', 300)->nullable();
            $table->string('telefono', 100)->nullable();
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
        Schema::dropIfExists('comercios');
    }
};
