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
        Schema::create('stores', function (Blueprint $table) {            
                $table->engine="InnoDB";   /* Para la eliminacion en cascada  */
                $table->bigIncrements('id');
                $table->string('name');  /* Nombre del negocio  */
                $table->string('adress'); 
                $table->string('phone'); 
                $table->string('email'); 
                $table->string('altitud'); // esta es la longitud
                $table->string('latitud'); 
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
        Schema::dropIfExists('stores');
    }
};
