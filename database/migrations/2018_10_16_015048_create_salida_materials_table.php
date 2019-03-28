<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidaMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('fecha')->index();
            $table->string('afiliado_id',12);
            $table->foreign('afiliado_id')->references('id')->on('afiliados');
            $table->string('user_id',12);
            $table->foreign('user_id')->references('id')->on('user');
            $table->float('Peso_Cera');
            $table->float('Peso_Miel');
            $table->float('Peso_Deduccion_Merma');
            $table->decimal('Total');
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
        Schema::dropIfExists('salida_materials');
    }
}
