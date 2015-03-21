<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterCommunitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('character_communities', function(Blueprint $table)
		{

			$table->string('character_id', 36);
			$table->string('community_id', 36);

			$table->primary(['character_id', 'community_id']);

			$table->foreign('character_id')->references('id')->on('characters');
			$table->foreign('community_id')->references('id')->on('communities');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('character_communities');
	}

}
