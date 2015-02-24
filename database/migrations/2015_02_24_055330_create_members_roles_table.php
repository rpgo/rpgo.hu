<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersRolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members_roles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();

            $table->string('member_id', 36);
            $table->string('role_id', 36);

            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('role_id')->references('id')->on('roles');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('members_roles');
	}

}
