<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Generos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //creacion de tabla geneeros 
        Schema::create('generos', function (Blueprint $table) {

            $table->engine="InnoDB";//crea tabla y borra en cascada
            $table->bigIncrements('id');
            $table->string('nombre'); 
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
        //
    }
}
