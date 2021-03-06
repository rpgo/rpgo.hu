<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chapters', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
			$table->timestamps();

			$table->string('title');
			$table->string('slug');

			$table->string('world_id', 36);
			$table->foreign('world_id')->references('id')->on('worlds');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chapters');
	}

}
