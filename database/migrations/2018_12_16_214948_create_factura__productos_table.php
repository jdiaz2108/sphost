<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura__productos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('factura_id')->nullable();
            $table->integer('producto_id')->nullable();
            $table->string('nombre')->nullable();
            $table->string('valor')->nullable();
            $table->text('descripcion')->nullable();
            $table->integer('destacado')->nullable();
            $table->string('color')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('orden')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('factura__productos');
    }
}
