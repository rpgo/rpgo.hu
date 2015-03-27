<?php

use Laracasts\TestDummy\Factory;
use Rpgo\Models\User;
use Rpgo\Models\World;

class RpgoTest extends TestCase {

	/**
	 * We have a home page.
	 *
	 * @test
	 */
	function the_home_page_works()
	{
		$this->visit('/')
			->see('RPGO');
	}

	/**
	 * There is a way to sign up.
	 *
	 * @test
     */
	function the_user_can_register()
	{

		$user = Factory::attributesFor(User::class);

		$this->visit('regisztracio')
			->type($user['name'], 'name')
			->type($user['email'], 'email')
			->type($user['password'], 'password')
			->type($user['password'], 'password_confirmation')
			->press(trans('user.create.submit'))
			->see($user['name']);
	}

	/**
	 * There is a way to login.
	 *
	 * @test
	 */
	function the_user_can_login()
	{
		$user = Factory::create(User::class);

		$this->visit('bejelentkezes')
			->type($user['email'], 'email')
			->type('rpgotest', 'password')
			->press(trans('user.login.submit'))
			->see($user['name']);
	}

	/**
	 * @test
	 */
	function the_user_can_create_a_world()
	{
		$user = Factory::create(User::class);
		$this->be($user);

		$world = Factory::attributesFor(World::class);

		$this->visit('vilagok/uj')
			->type($world['name'], 'name')
			->type($world['brand'], 'brand')
			->type($world['slug'], 'slug')
			->type($user['name'], 'admin')
			->press(trans('world.create.submit'))
			->see($world['brand']);
	}

	/**
	 * @test
	 */
	function the_user_can_join_a_world()
	{
		$user = Factory::create(User::class);
		$this->be($user);

		$world = $this->world($user);

		$guest = Factory::create(User::class);
		$this->be($user);

		$this->verifyInDatabase('worlds', ['slug' => $world['slug']]);

		//$this->visit('csatlakozas');
		//TODO: switch to behat

	}

}
