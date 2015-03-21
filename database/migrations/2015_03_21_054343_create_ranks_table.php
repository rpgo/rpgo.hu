<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRanksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ranks', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
			$table->timestamps();

			$table->string('community_id', 36)->nullable();
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
		Schema::drop('ranks');
	}

}
