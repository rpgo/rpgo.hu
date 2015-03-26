<?php

class ExampleTest extends TestCase {

	/**
	 * We have a home page.
	 *
	 * @test
	 */
	public function the_home_page_works()
	{
		$this->visit('/')
			->see('RPGO');
	}

}
