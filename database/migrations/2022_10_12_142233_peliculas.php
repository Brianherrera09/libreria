<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Peliculas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //creacion tabla peliculas
        Schema::create('peliculas', function (Blueprint $table) {

            $table->engine="InnoDB"; //crea tabla y elimina en cascada
            $table->bigIncrements('id');
            $table->bigInteger('generos_id')->unsigned(); //campo relacionado con generos
            $table->string('nombre'); 
            $table->timestamps();

            $table->foreign('generos_id')->references('id')->on('generos')->onDelete("cascade");//generos_id FK relacionada
                                                                                            //con la tabla generos y elimina en cascada
            
        });
        // en el terminal colocar - "php artisan migrate" para migrar y crear tablas
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
