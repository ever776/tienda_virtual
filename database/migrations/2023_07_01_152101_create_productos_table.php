<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre')->nullable();
            $table->string('descrip')->nullable();
            $table->decimal('precioant')->nullable();
            $table->decimal('precio')->nullable();
            $table->integer('stock')->nullable();
            $table->boolean('destacado')->nullable();
            $table->string('foto')->nullable();
            $table->integer('clasificacion_id')->unsigned();
            $table->integer('marca_id')->unsigned();
            $table->integer('nacionalidad_id')->unsigned();

            $table->foreign('clasificacion_id')->references('id')->on('clasificacions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('marca_id')->references('id')->on('marcas')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('nacionalidad_id')->references('id')->on('nacionalidads')->cascadeOnDelete()->cascadeOnUpdate();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productos');
    }
}
