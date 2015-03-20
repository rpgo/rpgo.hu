<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Rpgo\Models\Participation;

class CreateParticipationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('participations', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
			$table->timestamps();

			$table->string('game_id', 36);
			$table->string('character_id', 36);
			$table->string('location_id', 36)->nullable();
			$table->enum('status', Participation::$statuses);

			$table->foreign('game_id')->references('id')->on('games');
			$table->foreign('character_id')->references('id')->on('characters');
			$table->foreign('location_id')->references('id')->on('locations');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('participations');
	}

}
