<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('imagen')->after('email_verified_at')->nullable();
            $table->string('nif')->after('id')->unique();
            $table->string('apellido1')->after('name');
            $table->string('apellido2')->after('apellido1')->nullable();
            $table->string('telefono')->after('apellido2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
