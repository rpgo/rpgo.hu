<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorldsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('worlds', function(Blueprint $table)
		{
            $table->string('id', 36)->primary();
			$table->timestamps();
            $table->string('name', 40);
            $table->string('slug', 20);
            $table->string('brand', 10);
            $table->string('creator_id', 36);

			$table->string('motto')->nullable();
            $table->timestamp('published_at')->nullable();

            $table->foreign('creator_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('worlds');
	}

}
