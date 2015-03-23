<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorldChoicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('world_choices', function(Blueprint $table)
		{
			$table->string('world_id', 36);
			$table->string('choice_id', 36);

			$table->primary(['world_id', 'choice_id']);

			$table->foreign('world_id')->references('id')->on('worlds');
			$table->foreign('choice_id')->references('id')->on('choices');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('world_choices');
	}

}
