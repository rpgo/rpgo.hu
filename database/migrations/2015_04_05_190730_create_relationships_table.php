<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relationships', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
			$table->timestamps();

			$table->string('name');
			$table->boolean('initial');

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
		Schema::drop('relationships');
	}

}
