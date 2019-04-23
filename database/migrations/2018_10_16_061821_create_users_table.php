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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
<<<<<<< HEAD
            $table->string('Apellido1',30);
            $table->string('Apellido2',30);
            $table->string('Telefono',15);
            $table->string('Direccion',100);
            $table->datetime('Fecha_Ingreso');
            $table->integer('Genero_Id')->unsigned();;
            $table->foreign('Genero_Id')->references('id')->on('generos');
<<<<<<< HEAD
            $table->integer('Rol_Id')->unsigned();
            $table->foreign('Rol_Id')->references('id')->on('rols');
<<<<<<< HEAD
            $table->integer('Estado_Id')->unsigned();
            $table->foreign('Estado_Id')->references('id')->on('estados');
=======
=======
>>>>>>> develop
            $table->integer('estado_id')->unsigned();
>>>>>>> develop
           
=======
            $table->tinyInteger('active')->default(1)->unsigned();
            $table->uuid('confirmation_code')->nullable();
            $table->boolean('confirmed')->default(config('access.users.confirm_email') ? false : true);
>>>>>>> Caro
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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

