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
            $table->bigIncrements('id');
            $table->string('name');
            
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        

    }

    /**
     * Reverse the migrations.
     * $table->integer('id_tipo_usuario')->unsigned();
     * $table->foreign('id_tipo_usuario')->references('id')->on('tipo_usuario');
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
