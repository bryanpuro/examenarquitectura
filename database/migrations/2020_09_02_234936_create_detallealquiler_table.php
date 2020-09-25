<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetallealquilerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallealquiler', function (Blueprint $table) {
            $table->increments('id_detalle');
            $table->integer('id_alquiler')->unsigned()->index();
            $table->foreign('id_alquiler')->references('id_alquiler')->on('alquiler');
            $table->integer('id_bicicleta')->unsigned()->index();
            $table->foreign('id_bicicleta')->references('id_bicicleta')->on('bicicletas');
            $table->double('precio');
            $table->integer('cantidad');
            $table->double('iva');
            $table->double('precio_final');
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
        Schema::dropIfExists('detallealquiler');
    }
}
