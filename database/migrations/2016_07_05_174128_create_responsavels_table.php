<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsavelsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('responsaveis', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('estabelecimentos_id')->unsigned();
			$table->foreign('estabelecimentos_id')->references('id')->on('estabelecimentos')->onDelete('cascade');
			$table->string('nome');
			$table->string('telefone');
			$table->string('email');
			$table->string('cep');
			$table->string('logradouro');
			$table->string('numero');
			$table->string('bairro');
			$table->string('cidade')->default('Sorocaba');
			$table->string('cpf');
			$table->string('rg');
			$table->string('cargo');
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
		Schema::drop('responsaveis');
	}

}
