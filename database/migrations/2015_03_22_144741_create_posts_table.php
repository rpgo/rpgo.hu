<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
			$table->timestamps();

			$table->string('root_id', 36)->nullable();

			$table->string('location_id', 36);
			$table->foreign('location_id')->references('id')->on('locations');

			$table->string('game_id', 36);
			$table->foreign('game_id')->references('id')->on('games');

			$table->string('character_id', 36);
			$table->foreign('character_id')->references('id')->on('characters');

			$table->string('member_id', 36);
			$table->foreign('member_id')->references('id')->on('members');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
