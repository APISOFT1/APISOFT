<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AceptarMatPrimas extends Migration
{
    
        public function up()
        {
            Schema::create('aceptar_mat_primas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('descripcion',50);
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
            Schema::dropIfExists('aceptar_mat_primas');
        }
  
    
}
