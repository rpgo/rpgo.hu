<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('faces', function(Blueprint $table)
		{
			$table->string('id', 36);
			$table->timestamps();

			$table->string('avatar_id', 36);
			$table->foreign('avatar_id')->references('id')->on('avatars');

			$table->string('character_id', 36);
			$table->foreign('character_id')->references('id')->on('characters');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('faces');
	}

}
