<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
           $table->string('id',12)->unique();            
            $table->string('name', 20);
            $table->string('Apellido1',30);
            $table->string('Apellido2',30);
            $table->string('Telefono',15);
            $table->string('Direccion',100);
            $table->datetime('Fecha_Ingreso');
            $table->integer('Genero_Id')->unsigned();;
            $table->foreign('Genero_Id')->references('id')->on('generos');
            $table->integer('estado_id')->unsigned();
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
        Schema::dropIfExists('user');
    }
}
