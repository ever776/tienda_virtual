<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNacionalidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nacionalidads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->string('bandera')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('nacionalidads');
    }
}
