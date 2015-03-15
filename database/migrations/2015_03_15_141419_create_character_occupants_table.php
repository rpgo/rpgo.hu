<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterTenantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('character_occupants', function(Blueprint $table)
		{
			$table->string('character_id', 36);
			$table->string('tenant_id', 36);
			$table->string('tenant_type');

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
		Schema::drop('character_tenants');
	}

}
