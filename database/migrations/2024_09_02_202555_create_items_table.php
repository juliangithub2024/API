<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->engine="InnoDB";   /* Para la eliminacion en cascada  */
            $table->bigIncrements('id');
            $table->bigInteger('stores_id')->unsigned();
            $table->string('name'); /* nombre del producto o servicio */ 
            $table->string('price');
            $table->string('discount');  // discount: es el  precio de descuento
            $table->string('sale'); /* sale: precio de venta, ya con el  descuento */ 
            $table->string('image');
            $table->timestamps();

            $table->foreign('stores_id')->references('id')->on('stores')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
