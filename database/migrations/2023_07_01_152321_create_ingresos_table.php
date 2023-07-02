<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIngresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha')->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('preciounit')->nullable();
            $table->integer('producto_id')->unsigned();
            $table->integer('proveedor_id')->unsigned();

            $table->foreign('producto_id')->references('id')->on('productos')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('proveedor_id')->references('id')->on('proveedors')->cascadeOnDelete()->cascadeOnUpdate();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ingresos');
    }
}
