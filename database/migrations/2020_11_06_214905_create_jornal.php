<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJornal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jornal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('dia');
            $table->Time('inicio_jornada');
            $table->time('fin_jornada');
            $table->double('precio_hora');
            $table->integer('id_usuario')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     * $table->integer('id_tipo_usuario')->unsigned();
     * $table->foreign('id_tipo_usuario')->references('id')->on('tipo_usuario');
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jornal');
    }
}
