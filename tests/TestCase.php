<?php

use Laracasts\Integrated\Extensions\Laravel as IntegrationTest;
use Laracasts\Integrated\Services\Laravel\DatabaseTransactions;
use Laracasts\TestDummy\Factory;
use Rpgo\Models\User;
use Rpgo\Models\World;

class TestCase extends IntegrationTest {

	use DatabaseTransactions;

	protected $baseUrl;

	public function baseUrl()
	{
		return $this->baseUrl ?: 'http://rpgo.dev';
	}

	public function setBaseUrl($url)
	{
		$this->baseUrl = $url;
	}

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

	function world(User $user = null)
	{
		$data = $user ? ['creator_id' => $user->id] : [];

		$world = Factory::create(World::class, $data);

		$this->setBaseUrl('http://' . $world['slug'] . '.rpgo.dev');

		return $world;
	}

}
