<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('roles', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
			$table->timestamps();

            $table->string('name_plural', 30);
            $table->string('name_singular', 30);
            $table->string('slug', 30);
            $table->boolean('custom');

            $table->text('description')->nullable();

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
		Schema::drop('roles');
	}

}
