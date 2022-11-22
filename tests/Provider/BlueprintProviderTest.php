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

use ShineUnited\WordPress\Dotenv\Provider\BlueprintProvider;
use ShineUnited\Conductor\Capability\BlueprintProvider as BlueprintProviderCapability;
use ShineUnited\Conductor\Filesystem\Blueprint\BlueprintInterface;

/**
 * Blueprint Provider Test
 */
class BlueprintProviderTest extends ProviderTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderClass(): string {
		return BlueprintProvider::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderInterface(): string {
		return BlueprintProviderCapability::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderMethod(): string {
		return 'getBlueprints';
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getObjectInterface(): string {
		return BlueprintInterface::class;
	}
}
