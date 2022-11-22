<?php

/**
 * This file is part of WordPress Dotenv Extensions.
 *
 * (c) Shine United LLC
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace ShineUnited\WordPress\Dotenv\Tests\Provider;

use ShineUnited\WordPress\Dotenv\Tests\TestCase;

/**
 * Base Provider Test Case
 */
abstract class ProviderTestCase extends TestCase {

	/**
	 * @return string Class of the provider.
	 */
	abstract protected function getProviderClass(): string;

	/**
	 * @return string Class of the provider interface.
	 */
	abstract protected function getProviderInterface(): string;

	/**
	 * @return string Method name of the provider.
	 */
	abstract protected function getProviderMethod(): string;

	/**
	 * @return string Class of the object interface.
	 */
	abstract protected function getObjectInterface(): string;

	/**
	 * @return void
	 */
	public function testProvider(): void {
		$providerClass = $this->getProviderClass();
		$providerInterface = $this->getProviderInterface();
		$providerMethod = $this->getProviderMethod();
		$objectInterface = $this->getObjectInterface();

		$provider = new $providerClass();
		$this->assertInstanceOf($providerInterface, $provider);

		$objects = $provider->$providerMethod();
		foreach ($objects as $object) {
			$this->assertInstanceOf($objectInterface, $object);
		}
	}
}
