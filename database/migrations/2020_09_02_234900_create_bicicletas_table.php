<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBicicletasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bicicletas', function (Blueprint $table) {
            $table->increments('id_bicicleta');
            $table->integer('id_cat')->unsigned()->index();
            $table->foreign('id_cat')->references('id_cat')->on('cat_bicicletas');
            $table->integer('stock');
            $table->string('modelo');
            $table->string('marca');
            $table->string('imagen');
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
        Schema::dropIfExists('bicicletas');
    }
}
