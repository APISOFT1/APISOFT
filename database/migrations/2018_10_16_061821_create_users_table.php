<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id',12)->unique();            
            $table->string('name', 20);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('Apellido1',30);
            $table->string('Apellido2',30);
            $table->string('Telefono',15);
            $table->string('Direccion',100);
            $table->datetime('Fecha_Ingreso');
            $table->integer('Genero_Id')->unsigned();;
            $table->foreign('Genero_Id')->references('id')->on('generos');
            $table->integer('Rol_Id')->unsigned();
            $table->foreign('Rol_Id')->references('id')->on('rols');
            $table->foreign('estado_id')->references('id')->on('estados');
           
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

/**
     * Run the migrations.