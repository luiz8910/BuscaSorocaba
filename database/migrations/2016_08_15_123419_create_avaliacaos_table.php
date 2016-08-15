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
		Schema::create('avaliacaos', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('estabelecimentos_id')->unsigned();
			$table->foreign('estabelecimentos_id')->references('id')->on('estabelecimentos')->onDelete('cascade');
			$table->string('estrela_1');
			$table->string('estrela_2');
			$table->string('estrela_3');
			$table->string('estrela_4');
			$table->string('estrela_5');
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
		Schema::drop('avaliacaos');
	}

}
