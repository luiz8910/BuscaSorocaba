<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shoppings', function(Blueprint $table) {
            $table->increments('id');
			$table->string('nome');
			$table->longText('info');
			$table->string('cinema');
			$table->string('cep');
			$table->string('logradouro');
			$table->string('numero');
			$table->string('bairro');
			$table->string('cidade')->default('Sorocaba');
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
		Schema::drop('shoppings');
	}

}
