<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstabelecimentosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('estabelecimentos', function(Blueprint $table) {
            $table->increments('id');
//			$table->integer('sub_categorias_id')->unsigned();
//			$table->foreign('sub_categorias_id')->references('id')->on('subcategorias');
			$table->string('nome');
			$table->string('telefone');
			$table->string('telefone2')->nullable();
			$table->string('email');
			$table->string('cep')->nullable();
			$table->string('logradouro');
			$table->string('numero');
			$table->string('bairro');
			$table->string('cidade')->default('Sorocaba');
			$table->string('quemSomos')->nullable();
			$table->string('servicos')->nullable();
			$table->string('site')->nullable();
			$table->boolean('24h')->default(0);
			$table->boolean('emergencia')->default(0);
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
		Schema::drop('estabelecimentos');
	}

}
