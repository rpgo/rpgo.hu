<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memories', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
			$table->timestamps();

			$table->string('character_id', 36);
			$table->foreign('character_id')->references('id')->on('characters');

			$table->string('game_id', 36)->nullable();
			$table->foreign('game_id')->references('id')->on('games');

			$table->integer('order')->unsigned();

			$table->text('body');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('memories');
	}

}
