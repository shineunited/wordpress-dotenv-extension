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

namespace ShineUnited\WordPress\Dotenv\Tests\Extension;

use ShineUnited\WordPress\Dotenv\Tests\TestCase;
use ShineUnited\WordPress\Installer\Extension\ExtensionInterface;
use ReflectionClass;

/**
 * Base Extension Test Case
 */
abstract class ExtensionTestCase extends TestCase {

	/**
	 * @return string Extension class.
	 */
	abstract protected function getExtensionClass(): string;

	/**
	 * @return string[] Constructor arguments.
	 */
	abstract protected function getConstructorArguments(): array;

	/**
	 * @return integer Expected priority.
	 */
	abstract protected function expectedPriority(): int;

	/**
	 * @return mixed The extension.
	 */
	protected function createExtension(): mixed {
		$class = $this->getExtensionClass();
		$args = $this->getConstructorArguments();
		$reflector = new ReflectionClass($class);

		return $reflector->newInstanceArgs($args);
	}

	/**
	 * @return void
	 */
	public function testConstructor(): void {
		$extension = $this->createExtension();

		$this->assertInstanceOf($this->getExtensionClass(), $extension);
		$this->assertInstanceOf(ExtensionInterface::class, $extension);
	}

	/**
	 * @return void
	 */
	public function testGetPriority(): void {
		$extension = $this->createExtension();

		$priority = $this->expectedPriority();
		$this->assertSame($priority, $extension->getPriority());
	}
}
