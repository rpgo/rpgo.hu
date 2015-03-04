<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('types', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
			$table->timestamps();

            $table->string('pointer', 20);
			$table->boolean('automates_members');
			$table->boolean('no_members');
			$table->string('explanation');

			$table->string('template_id', 36)->nullable();

            //$table->string('name_group', 30);
            //$table->string('name_solo', 30);
            //$table->text('description');
            //$table->string('slug', 30);
            //$table->boolean('secret');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('types');
	}

}
