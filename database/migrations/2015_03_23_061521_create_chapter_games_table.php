<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterGamesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chapter_games', function(Blueprint $table)
		{
			$table->string('chapter_id', 36);
			$table->string('game_id', 36);

			$table->primary(['chapter_id', 'game_id']);

			$table->foreign('chapter_id')->references('id')->on('chapters');
			$table->foreign('game_id')->references('id')->on('games');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chapter_games');
	}

}
