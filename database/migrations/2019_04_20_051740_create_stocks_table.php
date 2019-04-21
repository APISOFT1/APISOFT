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
            $table->double('precioTotal')->default(0);;
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('producto');
            $table->integer('estanon_recepcions_id')->unsigned();
            $table->foreign('estanon_recepcions_id')->references('id')->on('estanon_recepcions');
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
