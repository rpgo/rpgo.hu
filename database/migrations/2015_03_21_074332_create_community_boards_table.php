<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityBoardsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('community_boards', function(Blueprint $table)
		{
			$table->timestamps();

			$table->string('community_id', 36);
			$table->string('board_id', 36);

			$table->primary(['community_id', 'board_id']);

			$table->foreign('community_id')->references('id')->on('communities');
			$table->foreign('board_id')->references('id')->on('boards');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('community_boards');
	}

}
