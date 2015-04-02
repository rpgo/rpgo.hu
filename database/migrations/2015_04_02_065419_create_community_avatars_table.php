<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityAvatarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('community_avatars', function(Blueprint $table)
		{
			$table->timestamps();

			$table->string('community_id', 36);
			$table->string('avatar_id', 36);

			$table->primary(['community_id', 'avatar_id']);

			$table->foreign('community_id')->references('id')->on('communities');
			$table->foreign('avatar_id')->references('id')->on('avatars');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('community_avatars');
	}

}
