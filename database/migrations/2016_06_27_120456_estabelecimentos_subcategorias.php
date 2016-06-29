<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EstabelecimentosSubcategorias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estabelecimentos_sub_categoria', function (Blueprint $table) {
            //$table->increments('id');

            $table->integer('estabelecimentos_id')->unsigned()->index();
            $table->foreign('estabelecimentos_id')->references('id')->on('estabelecimentos')->onDelete('cascade');


            $table->integer('sub_categoria_id')->unsigned()->index();
            $table->foreign('sub_categoria_id')->references('id')->on('subcategorias')->onDelete('cascade');

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estabelecimentos_sub_categoria');
    }
}
