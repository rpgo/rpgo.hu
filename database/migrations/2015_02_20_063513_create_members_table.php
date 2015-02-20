<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
			$table->string('id', 36)->primary();
			$table->timestamps();
            $table->string('name', 30);
            $table->string('world_id', 36);
            $table->string('user_id', 36);

            $table->foreign('world_id')->references('id')->on('worlds');
            $table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members');
	}

}
