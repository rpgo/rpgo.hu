<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsWorldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations_worlds', function(Blueprint $table)
		{
            $table->string('location_id', 36);
            $table->string('world_id', 36);

            $table->primary(['location_id', 'world_id']);

            $table->foreign('location_id')->references('id')->on('locations');
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
		Schema::drop('locations_worlds');
	}

}
