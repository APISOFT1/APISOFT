<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngrsolaminaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso_lamina', function (Blueprint $table) {
            $table->increments('iddetalle_ingreso_lamina');
            $table->integer('idingreso_lamina')->unsigned();
            $table->foreign('idingreso_lamina')->references('idingreso_lamina')->on('ingreso_lamina');
            $table->integer('lamina_id')->unsigned();
            $table->foreign('lamina_id')->references('id')->on('laminas');
            $table->double('Precio');
            $table->integer('cantidad');
            $table->double('descuento');
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
        Schema::dropIfExists('detalle_ingreso_lamina');
    }
}
