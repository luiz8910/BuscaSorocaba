<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('avaliacoes', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('estabelecimentos_id')->unsigned();
			$table->foreign('estabelecimentos_id')->references('id')->on('estabelecimentos')->onDelete('cascade');
			$table->integer('estrela_1');
			$table->integer('estrela_2');
			$table->integer('estrela_3');
			$table->integer('estrela_4');
			$table->integer('estrela_5');
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
		Schema::drop('avaliacoes');
	}

}
