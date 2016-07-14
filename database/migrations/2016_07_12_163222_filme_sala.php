<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FilmeSala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filme_sala', function(Blueprint $table){
            $table->increments('id');
            $table->integer('filme_id')->unsigned();
            $table->foreign('filme_id')->references('id')->on('filmes')->onDelete('cascade');
            $table->integer('salas_id')->unsigned();
            $table->foreign('salas_id')->references('id')->on('salas')->onDelete('cascade');
            $table->string('horario');
            $table->string('audio');
            $table->string('qualidade');
            $table->softDeletes();
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
        Schema::drop('filme_sala');
    }
}
