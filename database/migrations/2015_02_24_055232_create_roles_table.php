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

            $table->string('name_group', 30);
            $table->string('name_solo', 30);
            $table->string('slug', 30);
            $table->boolean('secret_role');
			$table->smallInteger('membership'); // 0: manual, 1: automatic, 2: via join, -1: no members

			$table->integer('rank');

            $table->text('description')->nullable();

            $table->string('world_id', 36)->nullable();
            $table->foreign('world_id')->references('id')->on('worlds');

            $table->string('type_id', 36)->nullable();
            $table->foreign('type_id')->references('id')->on('types');

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
