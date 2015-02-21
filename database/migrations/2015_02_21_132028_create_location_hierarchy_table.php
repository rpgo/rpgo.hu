<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationHierarchyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('location_hierarchy', function(Blueprint $table)
		{
            $table->string('ancestor_id', 36);
            $table->string('descendant_id', 36);

            $table->integer('depth');

            $table->primary(['ancestor_id', 'descendant_id']);

            $table->foreign('ancestor_id')->references('id')->on('locations');
            $table->foreign('descendant_id')->references('id')->on('locations');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('location_hierarchy');
	}

}
