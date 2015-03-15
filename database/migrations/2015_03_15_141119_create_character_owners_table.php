<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterOwnersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('character_owners', function(Blueprint $table)
		{
			$table->string('character_id', 36);
			$table->string('owner_id', 36);
			$table->string('owner_type');

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
		Schema::drop('character_owners');
	}

}
