<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso', function (Blueprint $table) {
            $table->increments('iddetalle_ingreso');
            $table->integer('idingreso')->unsigned();
            $table->foreign('idingreso')->references('idingreso')->on('ingreso');
            $table->integer('idproducto')->unsigned();
            $table->foreign('idproducto')->references('id')->on('producto');
            $table->double('Peso');
            $table->double('deduccionMerma');
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
        Schema::dropIfExists('detalle_ingreso');
    }
}
