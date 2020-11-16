<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distrito', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idProvincia');
            $table->foreign('idProvincia')->references('id')->on('provincia')->onDelete('cascade')->onUpdate('cascade');
            $table->string('descripcion');
            $table->char('codigoDistrital',4)->unique();
            $table->char('codigo',2);
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
        Schema::dropIfExists('distrito');
    }
}
