<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlquilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alquiler', function (Blueprint $table) {
            $table->increments('id_alquiler');
            $table->integer('id_cliente')->unsigned()->index();
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->time('hora_alquiler');
            $table->time('hora_devolucion');
            $table->date('fecha_alquiler');
            $table->date('fecha_devolucion');
            $table->string('estado');
            $table->string('garantia');  
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
        Schema::dropIfExists('alquiler');
    }
}
