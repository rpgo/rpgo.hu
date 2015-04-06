<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
			$table->timestamps();

			$table->string('object_id', 36);
			$table->foreign('object_id')->references('id')->on('characters');

			$table->string('subject_id', 36);
			$table->foreign('subject_id')->references('id')->on('characters');

			$table->string('relationship_id', 36);
			$table->foreign('relationship_id')->references('id')->on('relationships');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contacts');
	}

}
