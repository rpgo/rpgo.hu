<?php

use Illuminate\Support\Facades\Hash;
use Laracasts\TestDummy\Factory;
use Rpgo\Models\User;

class ExampleTest extends TestCase {

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
			->press('Regisztrálok!')
			->see($user['name']);
	}

	/**
	 * There is a way to login.
	 *
	 * @test
	 */
	function the_user_can_login()
	{
		$user = Factory::create(User::class, ['password' => Hash::make('rpgotest')]);

		$this->visit('bejelentkezes')
			->type($user['email'], 'email')
			->type('rpgotest', 'password')
			->press('Bejelentkezés')
			->see($user['name']);
	}

}
