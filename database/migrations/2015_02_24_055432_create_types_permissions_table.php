<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesPermissionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('types_permissions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

            $table->string('type_id', 36);
            $table->string('permission_id', 36);

            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('permission_id')->references('id')->on('permissions');

            $table->integer('grant');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('types_permissions');
	}

}
