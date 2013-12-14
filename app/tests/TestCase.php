<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Creates the application.
	 *
<<<<<<< HEAD
	 * @return Symfony\Component\HttpKernel\HttpKernelInterface
=======
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
>>>>>>> 796cee92fa5aa2c766a790c117f1385936f13a26
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__.'/../../bootstrap/start.php';
	}

}
