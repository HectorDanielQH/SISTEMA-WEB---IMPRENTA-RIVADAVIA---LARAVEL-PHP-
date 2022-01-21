<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->unsignedBigInteger('id_encargados')->nullable();
            $table->foreign('id_encargados')->references('id')->on('encargados');
            $table->unsignedBigInteger('id_jefe')->nullable();
            $table->foreign('id_jefe')->references('id')->on('jefes');
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
