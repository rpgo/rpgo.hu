<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvatarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('avatars', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
			$table->timestamps();
			$table->timestamp('accepted_on')->nullable();

			$table->string('actor_id', 36)->nullable();
			$table->foreign('actor_id')->references('id')->on('actors');

			$table->string('uploader_id', 36)->nullable();
			$table->foreign('uploader_id')->references('id')->on('members');

			$table->string('creator_id', 36)->nullable();
			$table->foreign('creator_id')->references('id')->on('members');

			$table->string('url')->nullable();

			$table->string('description')->default('');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('avatars');
	}

}
