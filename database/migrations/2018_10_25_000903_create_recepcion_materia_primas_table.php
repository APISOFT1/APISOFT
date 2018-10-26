<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecepcionMateriaPrimasTable extends Migration
{
  
    public function up()
    {
        Schema::create('recepcion_materia_primas', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->datetime('fecha');
            $table->float('pesoBruto');
            $table->increments('numero_muestras');
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('aceptarMatPrima_id');
            $table->foreign('aceptarMatPrima_id')->references('id')->on('aceptar_mat_primas');
            $table->string('afiliado_id');
            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->integer('tipoEntrega_id')->unsigned();
            $table->foreign('tipoEntrega_id')->references('id')->on('tipo_entregas');
            $table->timestamps();
        });
    }

  
    public function down()
    {
        Schema::dropIfExists('recepcion_materia_primas');
    }
}
