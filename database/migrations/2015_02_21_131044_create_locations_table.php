<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
			$table->timestamps();

            $table->string('name', 40);
            $table->string('slug', 40);

            $table->string('creator_id', 36);

            $table->foreign('creator_id')->references('id')->on('members');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('locations');
	}

}
