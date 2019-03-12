<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecepcionMateriaPrimas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcion_materia_primas', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha')->index();
            $table->float('pesoBruto');
            $table->integer('numero_muestras')->unsigned();
            $table->string('afiliado_id',12);
            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->string('user_id',12);
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('tipoEntrega_id')->unsigned();
            $table->foreign('tipoEntrega_id')->references('id')->on('tipo_entregas');
            $table->integer('aceptarMatPrima_id')->unsigned();;
            $table->foreign('aceptarMatPrima_id')->references('id')->on('aceptar_mat_primas');
            $table->longText('observacion');
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
        Schema::dropIfExists('recepcion_materia_primas');
    }
}
