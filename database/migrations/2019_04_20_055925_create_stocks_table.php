<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidadDisponible')->default(0);
            $table->double('precioUnitario')->default(0);;
            $table->integer('estanon_recepcions_id')->unsigned();
            $table->foreign('estanon_recepcions_id')->references('id')->on('recepcion_estanons');
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->integer('presentacion_id')->unsigned();
            $table->foreign('presentacion_id')->references('id')->on('presentacions');
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
        Schema::dropIfExists('stocks');
    }
}
