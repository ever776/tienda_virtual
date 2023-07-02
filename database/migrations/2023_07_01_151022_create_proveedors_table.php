<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->string('propietario')->nullable();
            $table->string('cinit')->nullable();
            $table->string('telcelular')->nullable();
            $table->string('direccion')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('proveedors');
    }
}
