<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroArchivoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registroArchivo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idTipoDocumento');
            $table->foreign('idTipoDocumento')->references('id')->on('tipodocumento')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idTipoFormato');
            $table->foreign('idTipoFormato')->references('id')->on('tipoformato')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idIdioma');
            $table->foreign('idIdioma')->references('id')->on('idioma')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idDepartamento');
            $table->foreign('idDepartamento')->references('id')->on('departamento')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idProvincia');
            $table->foreign('idProvincia')->references('id')->on('provincia')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idDistrito');
            $table->foreign('idDistrito')->references('id')->on('distrito')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idAutor');
            $table->foreign('idAutor')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('idDerecho');
            $table->foreign('idDerecho')->references('id')->on('nodo')->onDelete('cascade')->onUpdate('cascade');

            $table->string('titulo');
            $table->string('descripcion');
            $table->text('enlace')->nullable();
            $table->char('codigo')->unique();
            $table->timestamps();
            $table->boolean('estado');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registroArchivo');
    }
}
