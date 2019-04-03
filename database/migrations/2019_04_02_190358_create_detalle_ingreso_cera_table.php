<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleIngresoCeraTable extends Migrationphp 
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_ingreso_cera', function (Blueprint $table) {
            $table->increments('iddetalle_ingreso_cera');
            $table->integer('idingresocera')->unsigned();
            $table->foreign('idingresocera')->references('idingresocera')->on('ingreso_cera');
            $table->integer('idproducto')->unsigned();
            $table->foreign('idproducto')->references('id')->on('producto');
            $table->double('Peso');
            $table->double('deduccionMerma');
            $table->timestamps();
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
        Schema::dropIfExists('detalle_ingreso_cera');
    }
}
