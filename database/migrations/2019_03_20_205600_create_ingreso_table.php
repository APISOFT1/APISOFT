<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso', function (Blueprint $table) {
            $table->increments('idingreso');
            $table->string('idproveedor',12);
            $table->foreign('idproveedor')->references('id')->on('afiliados');
            $table->string('idusuario',12);
            $table->foreign('idusuario')->references('id')->on('users');
            $table->string('tipo_comprobante');
            $table->string('serie_comprobante');
            $table->double('total_venta');
            $table->dateTime('fecha_hora');
            $table->string('estado');
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
        Schema::dropIfExists('ingreso');
    }
}
