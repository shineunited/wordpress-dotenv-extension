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

use ShineUnited\WordPress\Dotenv\Extension\DotenvSetupExtension;

/**
 * Dotenv Setup Extension
 */
class DotenvSetupExtensionTest extends ExtensionTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getExtensionClass(): string {
		return DotenvSetupExtension::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getConstructorArguments(): array {
		return [];
	}

	/**
	 * {@inheritDoc}
	 */
	protected function expectedPriority(): int {
		return 1;
	}

	/**
	 * @return void
	 */
	public function testGenerateCode(): void {
		$this->toDo();
	}
}
