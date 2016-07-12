<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('salas', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('shopping_id')->unsigned();
			$table->foreign('shopping_id')->references('id')->on('shoppings')->onDelete('cascade');
			$table->string('numero');
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
		Schema::drop('salas');
	}

}
