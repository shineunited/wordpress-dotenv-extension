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

use ShineUnited\WordPress\Dotenv\Provider\ParameterProvider;
use ShineUnited\Conductor\Capability\ParameterProvider as ParameterProviderCapability;
use ShineUnited\Conductor\Configuration\Parameter\ParameterInterface;

/**
 * Parameter Provider Test
 */
class ParameterProviderTest extends ProviderTestCase {

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderClass(): string {
		return ParameterProvider::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderInterface(): string {
		return ParameterProviderCapability::class;
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getProviderMethod(): string {
		return 'getParameters';
	}

	/**
	 * {@inheritDoc}
	 */
	protected function getObjectInterface(): string {
		return ParameterInterface::class;
	}
}
