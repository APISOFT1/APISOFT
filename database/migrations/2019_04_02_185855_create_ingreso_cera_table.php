<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoCeraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_cera', function (Blueprint $table) {
            $table->increments('idingresocera');
            $table->string('idproveedor',12);
            $table->foreign('idproveedor')->references('id')->on('afiliados');
            $table->string('idusuario',12);
            $table->foreign('idusuario')->references('id')->on('users');
            $table->string('tipo_comprobante');
            $table->string('serie_comprobante');
            $table->string('tipo_pago');
            $table->double('total_venta');
            $table->dateTime('fecha_hora');
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
        Schema::dropIfExists('ingreso_cera');
    }
}
